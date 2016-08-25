<?php 

class HomeController extends PageController {

	public function __construct($dbc) {

		parent::__construct();

		$this->dbc = $dbc;

	}

	public function buildHTML() {

		$allData = $this->getLatestUploads();

		$this->data['allUploads'] = $allData;

		echo $this->plates->render('home', $this->data);

	}

	private function getLatestUploads() {

		$sql = "SELECT uploads.id, title, image, user_id, username FROM uploads JOIN users ON user_id = users.id";

		$result = $this->dbc->query($sql);

		$allData = $result->fetch_all(MYSQLI_ASSOC);

		return $allData;

	}

}