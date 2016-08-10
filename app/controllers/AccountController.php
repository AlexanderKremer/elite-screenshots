<?php 

use Intervention\Image\ImageManager;

class AccountController extends PageController {

	public function __construct($dbc) {

		parent::__construct();

		$this->dbc = $dbc;

		$this->mustBeLoggedIn();

		if( isset($_POST['new-upload']) ) {
			$this->processNewUpload();
		}

	}

	public function buildHTML() {

	echo $this->plates->render('account', $this->data);

	}

	private function ProcessNewUpload() {

		$totalErrors = 0;

		$title = trim($_POST['title']);
		$desc  = trim($_POST['desc']);

		if ( strlen($title) == 0 ) {
			$this->data['titleMessage'] = '<p>Required</p>';
			$totalErrors++;
		} elseif( strlen( $title ) > 50 ) {
			$this->data['titleMessage'] = '<p>Cannot be more than 50 characters</p>';
			$totalErrors++;
		}

		if( strlen( $desc ) == 0 ) {
			$this->data['descMessage'] = '<p>Required</p>';
			$totalErrors++;
		} elseif( strlen( $desc ) > 400 ) {
			$this->data['descMessage'] = '<p>Cannot bemore than 400 characters</p>';
			$totalErrors++;
		}

		if( $totalErrors == 0 ) {

			$title = $this->dbc->real_escape_string($title);
			$desc = $this->dbc->real_escape_string($desc);

			$userID = $_SESSION['id'];

			// $sql = "INSERT INTO uploads (title, description, user_id, image)
			// 		VALUES ('$title', '$desc', $userID, '$fileName$fileExtension') ";

			$sql = "INSERT INTO uploads (title, description, user_id)
					VALUES ('$title', '$desc', $userID) ";

			$this->dbc->query( $sql );

			if( $this->dbc->affected_rows ) {
				$this->data['postMessage'] = 'Success!';
			} else {
				$this->data['postMessage'] = 'Something went wrong!';
			}

		}

		// if( in_array( $_FILES['image']['error'], [1,3,4] ) ) {
		// 	$this->data['imageMessage'] = 'Image failed to upload';
		// 	$totalErrors++;
		// } elseif( !in_array( $_FILES['image']['type'], $this->acceptableImageTypes ) ) {
		// 	$this->data['imageMessage'] = 'Must be an image (jpg, gif, png, tiff etc)';
		// 	$totalErrors++;
		// }

		// if( $totalErrors == 0 ) {
			
		// 	$manager = new ImageManager(array('driver' => 'imagick'));

		// 	// $image = $manager->make( $_FILES['image']['tmp_name'] )->resize(300, 200);

		// 	// $image->save('img/test1.jpg');

		// 	$title = $this->dbc->real_escape_string($title);
		// 	$desc = $this->dbc->real_escape_string($desc);

		// 	$userID = $_SESSION['id'];


		// }
	}

	// private function getFileExtension( $mimeType ) {

	// 	switch($mimeType) {

	// 		case 'image/png':
	// 			return '.png';
	// 		break;

	// 		case 'image/gif':
	// 			return '.gif';
	// 		break;

	// 		case 'image/jpeg':
	// 			return '.jpg';
	// 		break;

	// 		case 'image/bmp':
	// 			return '.bmp';
	// 		break;

	// 		case 'image/tiff':
	// 			return '.tif';
	// 		break;
	// 	}
	// }
}