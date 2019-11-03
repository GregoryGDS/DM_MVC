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
		
			case '/log_out/':
				require_once(__DIR__.'/controller/log_out/log_out.php');
				break;

			case '/FormNew_user':
				require_once(__DIR__.'/controller/new/access_form_new_user.php');
				break;

			case '/controller/sign_in/'://vérifie valeur champ inscription et ajoute l'utilisateur
				require_once(__DIR__.'/controller/controller_sign_in/controller_sign_in.php');
				break;

			case '/controller/post_access/'://ouvre le post
				require_once(__DIR__.'/controller/post_access/post_access.php');
				break;

			case '/view/access_new_post/'://envoie vers le formulaire de création de post
				require_once(__DIR__.'/controller/new/access_new_post.php');
				break;

			case '/controller/form_new_post'://création de post par l'utilisateur actuel
				require_once(__DIR__.'/controller/new/form_new_post.php');
				break;

			case '/view/access_all_post/'://gestion des posts
				require_once(__DIR__.'/controller/posts/control_list_allPost.php');
				break;

			case '/controller/access_update_post':
				require_once(__DIR__.'/controller/posts/access_update_post.php');
				break;

			case '/controller/update_post':
				require_once(__DIR__.'/controller/posts/update_post.php');
				break;

			case '/controller/delete_post':
				require_once(__DIR__.'/controller/posts/delete_post.php');
				break;

			case '/view/access_all_categories/'://gestion des catégories
				require_once(__DIR__.'/controller/categories/access_all_categories.php');
				break;

			case '/controller/addCategory/':
				require_once(__DIR__.'/controller/categories/addCategory.php');
				break;

			case '/controller/delete_category':
				require_once(__DIR__.'/controller/categories/delete_category.php');
				break;

			case '/controller/delete_comment':
				require_once(__DIR__.'/controller/comments/delete_comment.php');
				break;

			case '/controller/new_comment':
				require_once(__DIR__.'/controller/comments/new_comment.php');
				break;
			default:
				require_once(__DIR__.'/view/404.php');
				break;
		}

	echo "</div>";
	require_once(__DIR__.'/view/footer.php');
	?>

	</body>
</html>