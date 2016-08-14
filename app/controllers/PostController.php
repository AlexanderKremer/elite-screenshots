<?php

class PostController extends PageController {

	public function __construct($dbc) {

		parent::__construct();

		$this->dbc = $dbc;

		$this->getPostData();
	}

	public function buildHTML() {

	echo $this->plates->render('post', $this->data);

	}

	private function getPostData() {

		$postID = $this->dbc->real_escape_string( $_GET['postid']);

		$sql = "SELECT title, description, image, created_at, updated_at, username
				FROM uploads
				JOIN users
				ON user_id = users.id
				WHERE uploads.id = $postID";

		$result = $this->dbc->query($sql);

		if ( !$result || $result->num_rows == 0 ) {
			header('Location: index.php?page=404');
		} else {
			$this->data['post'] = $result->fetch_assoc();
		}

	}
}