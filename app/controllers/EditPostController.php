<?php

class EditPostController extends PageController {

	public function __construct($dbc) {

		parent::__construct();

		$this->dbc = $dbc;

		$this->mustBeLoggedIn();

		if( isset($_POST['edit-post']) ) {
			$this->processUploadEdit();
		}

		$this->getUploadInfo();

	}

	public function buildHTML() {

		echo $this->plates->render('edit-post', $this->data);

	}

	private function getUploadInfo() {
		
		$uploadID = $this->dbc->real_escape_string($_GET['id']);

		$userID = $_SESSION['id'];

		$sql = "SELECT title, description, image
				FROM uploads
				WHERE id = $uploadID
				AND user_id = $userID";

		$result = $this->dbc->query($sql);
		
		if( !$result || $result->num_rows == 0 ) { 
			header("Location: index.php?page=post&postid=$postID");
		} else {
			if( isset($_POST['edit-post']) ) {
				$this->data['post'] =  $_POST;
				$result = $result->fetch_assoc();
				$this->data['originalTitle'] = $result['title'];
			} else {
				$result = $result->fetch_assoc();
				$this->data['post'] = $result;
				
				$this->data['originalTitle'] = $result['title'];	
			}
		}
	}

	private function processUploadEdit() {

		$totalErrors = 0;

		$title = $_POST['title'];
		$desc = $_POST['description'];

		if( strlen($title) > 50 ) {
			$totalErrors++;
			$this->data['titleError'] = '50 characters max for title length';
		}

		if( strlen($desc) > 50 ) {
			$totalErrors++;
			$this->data['descError'] = '400 characters max for description length';
		}

		if( $totalErrors == 0 ) {

			$title = $this->dbc->real_escape_string($title);
			$desc = $this->dbc->real_escape_string($desc);
			$postID = $this->dbc->real_escape_string($_GET['id']);
			$userID = $_SESSION['id'];

			$sql = "UPDATE uploads
					SET title = '$title',
						description = '$desc'
					WHERE id = $postID
					AND user_id = $userID";

			$this->dbc->query($sql);

			header("Location: index.php?page=post&postid=$postID");			
		}

	}

}