<?php

session_start();

require '../config.inc.php';
require 'vendor/autoload.php';
require 'app/controllers/PageController.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

switch($page) {

	case 'home':
		require 'app/controllers/HomeController.php';
		$controller = new HomeController($dbc);
	break;

	case 'register':
		require 'app/controllers/RegisterController.php';
		$controller = new RegisterController($dbc);
	break;

	case 'login':
		require 'app/controllers/LoginController.php';
		$controller = new LoginController($dbc);
	break;

	case 'account':
		require 'app/controllers/AccountController.php';
		$controller = new AccountController($dbc);
	break;

	case 'post':
		require 'app/controllers/PostController.php';
		$controller = new PostController($dbc);
	break;

	case 'edit-comment':
		require 'app/controllers/EditCommentController.php';
		$controller = new EditCommentController($dbc);
	break;

	case 'edit-post':
		require 'app/controllers/EditPostController.php';
		$controller = new EditPostController($dbc);
	break;

	case 'search':
		require 'app/controllers/SearchController.php';
		$controller = new SearchController($dbc);
	break;

	case 'logout':
		unset($_SESSION['id']);
		unset($_SESSION['privilege']);
		header('Location: index.php');
	break;

	default:
		require 'app/controllers/Error404Controller.php';
		$controller = new Error404Controller();
	break;

}

$controller->buildHTML();
