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

			$this->data['usernameMessage'] = 'Invalid username';
			$totalErrors++;

		}

		if( strlen($_POST['password']) < 8 ) {

			$this->data['passwordMessage'] = 'Invalid password';
			$totalErrors++;

		}

		if( $totalErrors == 0 ) {

			$filteredUsername = $this->dbc->real_escape_string( $_POST['username'] );

			$sql = "SELECT id, password, privilege
					FROM users
					WHERE username = '$filteredUsername'  ";

			$result = $this->dbc->query( $sql );

			if( $result->num_rows == 1 ) {

				$userData = $result->fetch_assoc();

				$passwordResult = password_verify( $_POST['password'], $userData['password'] );

				if( $passwordResult == true ) {

					$_SESSION['id'] = $userData['id'];
					$_SESSION['privilege'] = $userData['privilege'];

					header('Location: index.php?page=home');

				} else {

					$this->data['loginMessage'] = 'Username or Password incorrect';
				}

			} else {

				$this->data['loginMessage'] = 'Username or Password incorrect';

			}

		}

	}

}