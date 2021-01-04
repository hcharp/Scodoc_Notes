<?php
/***************************************/
/* Service de création de tocken JWT   /*
/* https://github.com/firebase/php-jwt */
/***************************************/

	$path = realpath($_SERVER['DOCUMENT_ROOT'] . '/..');
	include "$path/includes/auth.php";

	$authData = (object) authData();

	if($authData->session != 'sebastien.lehmann@uha.fr'){ 
		die("Ce service n'est autorisé que pour Sébastien Lehmann, vous pouvez le contacter.");
	}

	use \Firebase\JWT\JWT;

	include $path . '/includes/JWT/JWT.php';
	include $path . '/includes/JWT/key.php';

	$payload = [
		'session' => 'denis.graef@uha.fr', // mail de la personne destinataire du jeton
		'statut' => 'personnel', // etudiant ou personnel
		//'exp' => 1608498444 // (optionnel) timestamp d'expiration du tocken 
	];
	echo JWT::encode($payload, $key);
?>