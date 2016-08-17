<?php

class EditCommentController extends PageController {

	public function __construct($dbc) {

		parent::__construct();

		$this->dbc = $dbc;

		$this->mustBeLoggedIn();

		$this->mustOwnComment();

	}

	public function buildHTML() {

		echo $this->plates->render('edit-comment', $this->data);

	}

	private function mustOwnComment() {

		$userID = $_SESSION['id'];

		$commentID = $this->dbc->real_escape_string($_GET['id']);

		$sql = "SELECT comment
				FROM comments
				WHERE id = $commentID
				AND user_id = $userID";


		$result = $this->dbc->query( $sql );

		if ( !$result || $result->num_rows == 0 ) {
			header('Location: index.php?page=home');
		} else {
			$theComment = $result->fetch_assoc();

			$this->data['comment'] = $theComment['comment'];
		}

	}

}