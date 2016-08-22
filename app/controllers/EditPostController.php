<?php

use Intervention\Image\ImageManager;

class EditPostController extends PageController {

	private $acceptableImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/tiff'];

	public function __construct($dbc) {

		parent::__construct();

		$this->dbc = $dbc;

		$this->mustBeLoggedIn();

		if( isset($_POST['edit-post']) ) {
			$this->processUploadEdit();
		}

		$this->getUploadInfo();

	}

	public function buildHTML() {

		echo $this->plates->render('edit-post', $this->data);

	}

	private function getUploadInfo() {
		
		$uploadID = $this->dbc->real_escape_string($_GET['id']);

		$userID = $_SESSION['id'];

		$sql = "SELECT title, description, image
				FROM uploads
				WHERE id = $uploadID
				AND user_id = $userID";

		$result = $this->dbc->query($sql);
		
		if( !$result || $result->num_rows == 0 ) { 
			header("Location: index.php?page=post&postid=$uploadID");

		} else {
			if( isset($_POST['edit-post']) ) {
				$this->data['post'] =  $_POST;
				$result = $result->fetch_assoc();

				$this->data['originalTitle'] = $result['title'];

				$this->data['post']['image'] = $result['image'];
			} else {
				$result = $result->fetch_assoc();
				$this->data['post'] = $result;
				
				$this->data['originalTitle'] = $result['title'];	
			}
		}
	}

	private function processUploadEdit() {

		$totalErrors = 0;

		$title = trim($_POST['title']);
		$desc = trim($_POST['description']);

		if( strlen($title) > 50 ) {
			$totalErrors++;
			$this->data['titleError'] = '50 characters max for title length';
		}

		if( strlen($desc) > 400 ) {
			$totalErrors++;
			$this->data['descError'] = '400 characters max for description length';
		}

		if ($_FILES['image']['name'] != '' ) {
			if( in_array( $_FILES['image']['error'], [1,3,4] ) ) {
				$this->data['imageMessage'] = 'Image failed to upload';
				$totalErrors++;
			} elseif( !in_array( $_FILES['image']['type'], $this->acceptableImageTypes ) ) {
				$this->data['imageMessage'] = 'Must be an image (jpg, gif, png, tiff etc)';
				$totalErrors++;
			}
		}

		if( $totalErrors == 0 ) {

			$uploadID = $this->dbc->real_escape_string($_GET['id']);

			$sql = "SELECT image FROM uploads WHERE id = $uploadID";

			$result = $this->dbc->query($sql);

			$result = $result->fetch_assoc();

			$imageName = $result['image'];

			if( $_FILES['image']['name'] != '' ) {

				$manager = new ImageManager();

				$image = $manager->make( $_FILES['image']['tmp_name'] );

				$fileExtension = $this->getFileExtension( $image->mime() );

				$fileName = uniqid();

				$image->save("img/uploads/original/$fileName$fileExtension");

				$image->resize(620, null, function ($constraint) {
	    			$constraint->aspectRatio();
				});

				$image->save("img/uploads/stream/$fileName$fileExtension");

				unlink("img/uploads/original/$imageName");
				unlink("img/uploads/stream/$imageName");

				$imageName = $fileName.$fileExtension;
				
			}

			$title = $this->dbc->real_escape_string($title);
			$desc = $this->dbc->real_escape_string($desc);
			$userID = $_SESSION['id'];



			$sql = "UPDATE uploads
					SET title = '$title',
						description = '$desc',
						image = '$imageName'
					WHERE id = $uploadID
					AND user_id = $userID";

			$this->dbc->query($sql);

			if ( $this->dbc->affected_rows == 0 ) {
				$this->data['updateMessage'] = 'Nothing has changed';
			} else {
				header("Location: index.php?page=post&postid=$uploadID");		
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