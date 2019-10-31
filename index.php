<?php 
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href=<?php echo __DIR__;?>"/view/CSS/correction_Bootstrap.css">
		<title>DM MVC procédural</title>
	</head>
	<body>

	<?php

	require_once(__DIR__.'/view/header.php');

	$requestdPage = '/';

	if (isset($_SERVER['REQUEST_URI'])) { //URI = ce qu'il y a après le nom de domaine
		$requestdPage=$_SERVER['REQUEST_URI'];
		$requestdPage= explode('?', $requestdPage);// sépare la chîne de caratère avec ? en séparateur et la met dans un tableau
	}
	//var_dump($requestdPage);
	echo "<div class='container'>";
		switch ($requestdPage[0]) {
			case '/'://redirige vers l'accueil
				require_once(__DIR__.'/view/home/home.php');
				break;

			case '/view/access_form_connection/'://vérifie l'ouverture du formulaire de connexion
				require_once(__DIR__.'/controller/access_form_connection/access_form_connection.php');
				break;

			case '/controller/connection/'://vérifie valeur champ connexion et la connexion d'un utilisateur
				require_once(__DIR__.'/controller/controller_connection/controller_connection.php');
				break;
				
			case '/log_out':
				require_once(__DIR__.'/controller/log_out/log_out.php');
				break;
			case '/a+':
				echo "bye bye";	
				break;
			case '/FormNew_user':
				require_once(__DIR__.'/controller/new/access_form_new_user.php');
				break;
			case '/controller/sign_in/'://vérifie valeur champ inscription et ajoute l'utilisateur
				require_once(__DIR__.'/controller/controller_sign_in/controller_sign_in.php');
				break;

			default:
				require_once(__DIR__.'/view/404.php');
				break;
		}/*
		if (isset($_SESSION['current_user'])) {
		   // print_r($_SESSION['current_user']);
		}*/
	echo "</div>";
	?>

	</body>
</html>