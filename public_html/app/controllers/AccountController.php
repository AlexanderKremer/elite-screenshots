<?php 

use Intervention\Image\ImageManager;

class AccountController extends PageController {

	private $acceptableImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/tiff'];

	public function __construct($dbc) {

		parent::__construct();

		$this->dbc = $dbc;

		$this->mustBeLoggedIn();

		if( isset($_POST['update-email']) ) {
			$this->validateEmailForm();
		}

		if( isset($_POST['update-password']) ) {
			$this->validatePasswordForm();
		}

		if( isset($_POST['new-upload']) ) {
			$this->processNewUpload();
		}

	}

	public function buildHTML() {

	echo $this->plates->render('account', $this->data);

	}

	private function validateEmailForm() {

		$userID = $_SESSION['id'];
		$email = $_POST["email"];

		$totalErrors = 0;

		if( strlen($_POST['email']) == 0 ) {
			$this->data['emailMessage'] = 'No new E-mail entered';
			$totalErrors++;
		}

		if( $totalErrors == 0 ) {

			$sql = "UPDATE users SET email = '$email' WHERE id = $userID";
			
			die($sql);

			$this->dbc->query($sql);

			$this->data['emailMessage'] = 'E-mail Updated';
			// header('Location: index.php?page=account');
			return;
		}

	}

	private function validatePasswordForm() {

		$userID = $_SESSION['id'];
		$password = $_POST["password"];

		$totalErrors = 0;

		if( strlen($_POST['password']) < 8 ) {
			$this->data['passwordMessage'] = 'New Password Must be at least 8 characters';
			$totalErrors++;
		}


		if( $totalErrors == 0 ) {

			$hash = password_hash( $_POST['password'], PASSWORD_BCRYPT );

			// $sql = "UPDATE users SET password = '$password' WHERE id = $userID";
			// $sql = "UPDATE users SET password = '$password' WHERE id = $userID VALUES ('$hash')";
			// $sql = "UPDATE users SET (password) = '$password' WHERE id = $userID VALUES ('$hash')";
			$sql = "UPDATE users SET password = '$hash' WHERE id = $userID";

			

			$this->dbc->query($sql);

			$this->data['passwordMessage'] = 'Password Updated';
			// header('Location: index.php?page=account');
			return;

		}

	}

	private function ProcessNewUpload() {

		$totalErrors = 0;

		$title = trim($_POST['title']);
		$desc  = trim($_POST['desc']);

		if ( strlen($title) == 0 ) {
			$this->data['titleMessage'] = '<p>A title is required to upload an image</p>';
			$totalErrors++;
		} elseif( strlen( $title ) > 50 ) {
			$this->data['titleMessage'] = '<p>Cannot be more than 50 characters</p>';
			$totalErrors++;
		}

		if( strlen( $desc ) > 400 ) {
			$this->data['descMessage'] = '<p>Cannot bemore than 400 characters</p>';
			$totalErrors++;
		}

		if( in_array( $_FILES['image']['error'], [1,3,4] ) ) {
			$this->data['imageMessage'] = 'Image failed to upload';
			$totalErrors++;
		} elseif( !in_array( $_FILES['image']['type'], $this->acceptableImageTypes ) ) {
			$this->data['imageMessage'] = 'Must be an image (jpg, gif, png, tiff etc)';
			$totalErrors++;
		}


		if( $totalErrors == 0 ) {

			$manager = new ImageManager();

			$image = $manager->make( $_FILES['image']['tmp_name'] );

			$fileExtension = $this->getFileExtension( $image->mime() );

			$fileName = uniqid();

			$image->save("img/uploads/original/$fileName$fileExtension");

			$image->resize(620, null, function ($constraint) {
    			$constraint->aspectRatio();
			});

			$image->save("img/uploads/stream/$fileName$fileExtension");

			$title = $this->dbc->real_escape_string($title);
			$desc = $this->dbc->real_escape_string($desc);

			$userID = $_SESSION['id'];

			// $sql = "INSERT INTO uploads (title, description, user_id, image)
			// 		VALUES ('$title', '$desc', $userID, '$fileName$fileExtension') ";

			$sql = "INSERT INTO uploads (title, description, user_id, image)
					VALUES ('$title', '$desc', $userID, '$fileName$fileExtension') ";

			$this->dbc->query( $sql );

			$newPostID = $this->dbc->insert_id;

			if( $this->dbc->affected_rows ) {
				header("Location: index.php?page=post&postid=$newPostID");
			} else {
				$this->data['uploadMessage'] = 'Image failed to upload!';
			}

		}

	}

	private function getFileExtension( $mimeType ) {

		switch($mimeType) {

			case 'image/png':
				return '.png';
			break;

			case 'image/gif':
				return '.gif';
			break;

			case 'image/jpeg':
				return '.jpg';
			break;

			case 'image/bmp':
				return '.bmp';
			break;

			case 'image/tiff':
				return '.tif';
			break;
		}
	}
}