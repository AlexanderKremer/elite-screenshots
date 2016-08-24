<?php

class EditCommentController extends PageController {

	public function __construct($dbc) {

		parent::__construct();

		$this->dbc = $dbc;

		$this->mustBeLoggedIn();

		$this->mustOwnComment();

		if(isset($_POST['edit-comment'])) {
			$this->processComment();
		}

	}

	public function buildHTML() {

		echo $this->plates->render('edit-comment', $this->data);

	}

	private function mustOwnComment() {

		$userID = $_SESSION['id'];

		$commentID = $this->dbc->real_escape_string($_GET['id']);

		$sql = "SELECT comment, post_id
				FROM comments
				WHERE id = $commentID ";

		if ($_SESSION['privilege'] != 'admin' ) {
			$sql .= " AND user_id = $userID";
		}
		die($sql);


		$result = $this->dbc->query( $sql );

		if ( !$result || $result->num_rows == 0 ) {
			header('Location: index.php?page=home');
		} else {
			$theComment = $result->fetch_assoc();

			$this->data['comment'] = $theComment['comment'];
			$this->data['post_id'] = $theComment['post_id'];
		}

	}

	private function processComment() {

		$totalErrors = 0;

		if( strlen($_POST['comment']) > 250 ) {
			$totalErrors++;
			$this->data['commentError'] = 'Must be less than 250 characters in length';
		}

		if ( $totalErrors == 0 ) {

			$CommentID = $_GET['id'];

			$comment = $this->dbc->real_escape_string($_POST['comment']);

			$sql = "UPDATE comments
					SET comment = '$comment',
						updated_at = CURRENT_TIMESTAMP
					WHERE id = $CommentID";

			$this->dbc->query($sql);

			header('Location: index.php?page=post&postid='.$this->data['post_id']);

		}

	}

}