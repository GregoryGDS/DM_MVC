<?php
require_once(__DIR__.'/../../model/posts/modelPosts.php');

//print_r($_FILES['picture']);

if ($_FILES['picture']['name']!=='') {
	$title=htmlspecialchars($_POST['title']);
	$content=htmlspecialchars($_POST['content']);
	$categorie=htmlspecialchars($_POST['categorie']);
	$idUser=$_SESSION['current_user']['id'];
	$image=uploadImage_path($_FILES['picture']);

	if (array_key_exists('imagePath',$image)) {
		addPost($image['imagePath'],$title,$content,$categorie,$idUser);
		$etat = $image['message'];
	}
}else{
	$etat = 'Veuillez choisir une image ';
}

require_once (__DIR__ . '/../../view/posts/new_post.php');

?>

