<?php 

use Intervention\Image\ImageManager;

class AccountController extends PageController {

	private $acceptableImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/tiff'];

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

			if( $this->dbc->affected_rows ) {
				$this->data['uploadMessage'] = 'Image uploaded Successfully!';
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