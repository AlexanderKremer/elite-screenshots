<?php

class PostController extends PageController {

	public function __construct($dbc) {

		parent::__construct();

		$this->dbc = $dbc;

		if( isset($_POST['new-comment']) ) {
			$this->processNewComment();
		}

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

		$sql = "SELECT comments.id, user_id, comment, username
				FROM comments
				JOIN users
				ON comments.user_id = users.id
				WHERE post_id = $postID
				ORDER BY created_at DESC";

		$result = $this->dbc->query($sql);

		$this->data['allComments'] = $result->fetch_all(MYSQLI_ASSOC);

	}

	private function processNewComment() {

		$totalErrors = 0;

		if( $totalErrors == 0 ) {

			$comment = $this->dbc->real_escape_string( $_POST['comment'] );

			$userID = $_SESSION['id'];

			$postID = $this->dbc->real_escape_string( $_GET['postid'] );

			$sql = "INSERT INTO comments (comment, user_id, post_id)
					VALUES ('$comment', $userID, $postID)";

			$this->dbc->query($sql);

		}


	}

}