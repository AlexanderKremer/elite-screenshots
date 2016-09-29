<?php

abstract class PageController {

	protected $title;
	protected $metaDesc;
	protected $dbc;
	protected $plates;
	protected $data = [];

	public function __construct() {

		$this->plates = new League\Plates\Engine('app/templates');
	
	}

	abstract public function buildHTML();

	public function mustBeLoggedIn() {

		// If you are not logged in
		if( !isset($_SESSION['id']) ) {
			// Redirect the user to the login page
			header('Location: index.php?page=login');
			die();
		}

	}

	public function mustBeLoggedOut() {

		if( isset($_SESSION['id']) ) {
			// Redirect the user to the login page
			header('Location: index.php?page=home');
			die();
		}

	}

}