<?php

	//-------Données utiles pour la vue-------//
	define('LANG', 'fr');
	define('CHARSET', 'utf-8');
	define('TITLE', 'ExLibris - Bibliothèque en ligne');
	define('DESC', 'Bibliothèque en ligne ExLibris');


	//-------Données pour connexion au serveur-------//
	define('DSN', 'mysql:host=localhost;dbname=biblio');
	define('USERNAME', 'root');
	define('PASSWORD', '');


	$options = [
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 		//Quand SELECT, résultat obtenu sous forme de tableau associatif
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION 	// Valeur qu'on donne au mode d'erreur de PDO (qui, ici, renvoit une exception lors d'une erreur)
	];