<?php
require_once(__DIR__.'/../../model/comments/modelComments.php');

//echo 'ok delete';

$reTableau= implode("/", $requestdPage);
$tableau_action= explode('/', $reTableau);
//print_r($tableau_action);

if (in_array("delete_comment", $tableau_action)) {
	$endComment=htmlspecialchars($_GET['id_comment_delete']);
	//echo $endComment;
	delete_comment($endComment);
	require_once (__DIR__ . '/../../view/posts/post.php');
}
?>