<?php

class EditPostController extends PageController {

	public function __construct($dbc) {

		parent::__construct();

		$this->dbc = $dbc;

		$this->mustBeLoggedIn();

	}

	public function buildHTML() {

	echo $this->plates->render('edit-post', $this->data);

	}


}