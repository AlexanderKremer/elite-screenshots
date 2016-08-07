<?php

session_start();

require 'vendor/autoload.php';
require 'app/controllers/PageController.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$dbc = new mysqli('localhost', 'root', '', 'elite_screenshots');

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

	default:
		echo $plates->render('error404');
	break;

}

$controller->buildHTML();
