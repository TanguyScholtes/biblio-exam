<?php

	ini_set('display_error', 1);
	error_reporting(E_ALL);

	require 'vendor/autoload.php';



	

	include('config/config.php');
	include(CONFIG_DIR.'route.php');
	include(CONFIG_DIR.'database.php');
	include(HELPERS_DIR.'filesProcessor.php');


	/********************************************************************************************/
	/* ------- These includes have been replaced by Composer and namespaces autoloading ------- */
	/*********************************************************************************************
	include(MODELS_DIR.'sql.php');
	include(HELPERS_DIR.'filesProcessor.php');

	set_include_path( get_include_path().
			';'.dirname(__FILE__).'\\'.CONTROLLERS_DIR.
			';'.dirname(__FILE__).'\\'.MODELS_DIR.
			';'.dirname(__FILE__).'\\'.CONFIG_DIR
	);

	spl_autoload_register( function ($class)
	{
		include $class.'.php';
	});

	/********************************************************************************************/


	session_start();

	$_SESSION['valid'] = isset($_SESSION['valid']) ? $_SESSION['valid'] : false;





	if(isset($_REQUEST['a']) && isset($_REQUEST['m'])) 	//Test si a et m fournis
	{
		$route = $_REQUEST['m'].ROUTE_DELIMITER.$_REQUEST['a'];

		if (in_array($route, $routes))
		{
			extract($_REQUEST); 	//Crée 1 variable par paramètre de requête
		}
		else 	//Si fournis, on les prends, sinon, on crée des valeurs par défaut
		{
			$route = $routes['default'];
			$routeParts = explode(ROUTE_DELIMITER,$route);
			$a = $routeParts[1];
			$m = $routeParts[0];
		}

	}

	else 	// Si a et m pas fournis
	{
		$route = $routes['default'];
		$routeParts = explode(ROUTE_DELIMITER,$route);
		$a = $routeParts[1];
		$m = $routeParts[0];
	}


	//include(CONTROLLERS_DIR.$m.'Controller.php');
	$controllerName = '\\Controllers\\'.ucfirst($m).'Controller'; 	//ucfirst = met la 1ère lettre en majuscule
	$controller = new $controllerName;


	$data = call_user_func([$controller, $a]); 	




	include(VIEW_DIR.'layout.php');