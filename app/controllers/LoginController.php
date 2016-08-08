<?php

class LoginController extends PageController {

	public function __construct($dbc) {

		parent::__construct();

		$this->dbc = $dbc;

		if( isset( $_POST['login'] ) ) {
			$this->processLoginForm();
		}

	}

	public function buildHTML() {

		echo $this->plates->render('login', $this->data);

	}

	private function processLoginForm() {

		$totalErrors = 0;


		if( strlen($_POST['username']) < 3 ) {

			$this->data['usernameMessage'] = 'Invalid E-Mail';
			$totalErrors++;

		}

		if( strlen($_POST['password']) < 8 ) {

			$this->data['passwordMessage'] = 'Invalid password';
			$totalErrors++;

		}

		if( $totalErrors == 0 ) {

			// Check the database for the E-Mail address
			// Get the hashed password too
			$filteredUsername = $this->dbc->real_escape_string( $_POST['username'] );

			// Prepare SQL
			$sql = "SELECT id, password, privilege
					FROM users
					WHERE username = '$filteredUsername'  ";

			// Run the query
			$result = $this->dbc->query( $sql );

			// Is there a result?
			if( $result->num_rows == 1 ) {

				// Check the password
				$userData = $result->fetch_assoc();

				// Check the password
				$passwordResult = password_verify( $_POST['password'], $userData['password'] );

				// If the result was good
				if( $passwordResult == true ) {
					// Log the user in
					$_SESSION['id'] = $userData['id'];
					$_SESSION['privilege'] = $userData['privilege'];

					header('Location: index.php?page=home');

				} else {
					// Prepare error message
					$this->data['loginMessage'] = 'Username or Password incorrect';
				}

			} else {

				// Credentials do not match our records
				$this->data['loginMessage'] = 'Username or Password incorrect';

			}

		}

	}

}