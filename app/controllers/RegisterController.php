<?php 

class RegisterController extends PageController {

	private $usernameMessage;
	private $emailMessage;
	private $passwordMessage;

	public function __construct($dbc) {

		parent::__construct();

		$this->dbc = $dbc;

	}

public function buildHTML() {

		$data = [];

		echo $this->plates->render('register', $data);

	}

}