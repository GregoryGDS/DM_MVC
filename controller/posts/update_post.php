<?php

require_once(__DIR__.'/../../model/posts/modelPosts.php');
require_once(__DIR__.'/../../model/users/modelUsers.php');
//echo 'ok update';

$reTableau= implode("/", $requestdPage);
$tableau_action= explode('/', $reTableau);
//print_r($tableau_action);

if (in_array("update_post", $tableau_action)) {
	//echo "près pour update <br>";
	
	//require_once (__DIR__ . '/../../view/posts/update_form_post.php');
	$idPost=htmlspecialchars($_POST['idPost']);
	$title=htmlspecialchars($_POST['title']);
	$content=htmlspecialchars($_POST['content']);
	$category=htmlspecialchars($_POST['categorie']);
	$username=htmlspecialchars($_POST['username']);
	$infoUser=control_connexion($username);
	if (isset($infoUser)&&!empty($infoUser)) {
		//echo $idPost."<br>";
		//echo $title."<br>";
		//echo $content."<br>";
		//echo $category."<br>";
		//echo $username."<br>";
		//print_r($infoUser);
		//print_r($_FILES['picture']);

	    if(isset($_FILES['picture']['name']) && !empty($_FILES['picture']['name'])){
	    	//echo 'image donnée';
	    	$edit='edit';
			$image=uploadImage_path($_FILES['picture'],$edit);
			//print_r($image);
	   		 //si image selectionner
			updatePostImage($idPost,$image['imagePath'],$title,$content,$category,$infoUser['id']);
	    	$messageUpdate='Mise à jour avec image effectué';
	    }
	    else{
	    	//echo 'image vide';
	    	updatePostNoImg($idPost,$title,$content,$category,$infoUser['id']);
	    	$messageUpdate='Mise à jour sans image effectué';
			
	    }
	}else{//verif user
		$messageUpdate='L\'auteur n\'existe pas' ;
	}
	require_once (__DIR__ . '/../../view/posts/update_form_post.php');
}
/*

*/

?>