<?php 

class RegisterController extends PageController {

	private $usernameMessage;
	private $emailMessage;
	private $passwordMessage;

	public function __construct($dbc) {

		parent::__construct();

		$this->mustBeLoggedOut();

		$this->dbc = $dbc;

		if( isset($_POST['new-account']) ) {
			$this->validateRegistrationForm();
		}

	}

	public function buildHTML() {

		$data = [];

		if($this->usernameMessage != '') {
			$data['usernameMessage'] = $this->usernameMessage;
		}


		if($this->emailMessage != '') {
			$data['emailMessage'] = $this->emailMessage;
		}

		if($this->passwordMessage != '') {
			$data['passwordMessage'] = $this->passwordMessage;
		}

		echo $this->plates->render('register', $data);
	}

	public function registerAccount() {

	}

	private function validateRegistrationForm() {

		$totalErrors = 0;

		// Username validation
		if( $_POST['username'] == '') {
			$this->usernameMessage = 'Username required';
			$totalErrors;
		}

		$filteredUsername = $this->dbc->real_escape_string( $_POST['username'] );

		$sql = "SELECT username
				FROM users
				WHERE username = '$filteredUsername' ";
		// Username validation end

		// Email validation
		if( $_POST['email'] == '' ) {
			$this->emailMessage = 'Invalid E-Mail';
			$totalErrors++;
		}

		$filteredEmail = $this->dbc->real_escape_string( $_POST['email'] );

		$sql = "SELECT email
				FROM users
				WHERE email = '$filteredEmail' ";
		// Email validation end

		$result = $this->dbc->query($sql);

		if( !$result || $result->num_rows > 0 ) {
			$this->emailMessage = 'E-Mail in use';
			$totalErrors++;
		}

		if( strlen($_POST['username']) < 3 ) {
			$this->usernameMessage = 'Username must be at least 3 characters';
			$totalErrors++;
		}

		if( strlen($_POST['password']) < 8 ) {
			$this->passwordMessage = 'Password Must be at least 8 characters';
			$totalErrors++;
		}

		if( $totalErrors == 0 ) {

			$hash = password_hash( $_POST['password'], PASSWORD_BCRYPT );

			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$filteredUsername', '$filteredEmail', '$hash')";

			$this->dbc->query($sql);

			$_SESSION['id'] = $this->dbc->insert_id;
			$_SESSION['privilege'] = 'user';
			$_SESSION['username'] = $filteredUsername;
			
			header('Location: index.php?page=home');

		}

	}

}