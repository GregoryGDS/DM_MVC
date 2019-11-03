<?php
require_once(__DIR__.'/../../model/comments/modelComments.php');

//echo 'ok delete';

$reTableau= implode("/", $requestdPage);
$tableau_action= explode('/', $reTableau);
//print_r($tableau_action);

if (in_array("new_comment", $tableau_action)) {

	if (isset($_POST['content'])&&!empty($_POST['content'])) {
		$author=$_SESSION['current_user']['id'];
		$content=htmlspecialchars($_POST['content']);
		$post=$_SESSION['post']['id'];
		//echo $author;
		//echo $content;
		//echo $post;
		add_comment($author,$content,$post);
		$message='Ajout du commentaire effectué';
	}else{
		$message='Remplir les champs';
	}
	require_once (__DIR__.'/../../view/posts/post.php');
}
?>