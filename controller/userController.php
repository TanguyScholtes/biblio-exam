<?php

namespace Controllers;


class UserController extends BaseController
{

	function __construct()
	{;}

	function login()
	{
		if ($_SESSION['valid'])
		{
			header('Location: index.php');
		}
		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			if (isset($_POST['email']) && isset($_POST['password']))
			{
				extract($_POST);
				$user = new \Models\User;
				if ($user->exists($email, $password))
				{
					$_SESSION['valid'] = true;
					header('Location: index.php');
				}
				else
				{
					$_SESSION['valid'] = false;
					die('Vos identifiants sont incorrects.');
				}
			}
			else
			{
				die('On essaye de tricher ?');
			}
		}
		else
		{
			return [
						'data' => null,
						'view' => 'userlogin.php'
						];
		}

	}

	function logout()
	{
		$_SESSION['valid'] = false;
		session_destroy();
		header('Location: index.php');
	}

}