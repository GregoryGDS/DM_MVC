<?php
require_once(__DIR__.'/../../model/comments/modelComments.php');

//echo 'ok delete';

$reTableau= implode("/", $requestdPage);
$tableau_action= explode('/', $reTableau);
//print_r($tableau_action);

if (in_array("new_comment", $tableau_action)) {
	$content=htmlspecialchars($_POST['content']);
	if (isset($content)&&!empty($content)) {
		$author=$_SESSION['current_user']['id'];
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