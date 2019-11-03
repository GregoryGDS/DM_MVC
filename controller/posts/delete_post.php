<?php
require_once(__DIR__.'/../../model/posts/modelPosts.php');

//echo 'ok delete';

$reTableau= implode("/", $requestdPage);
$tableau_action= explode('/', $reTableau);
//print_r($tableau_action);

if (in_array("delete_post", $tableau_action)) {
	$endPost=htmlspecialchars($_GET['id_post_update']);
	//echo $endPost;
	delete_post($endPost);
	require_once (__DIR__ . '/../../view/posts/admin_posts.php');
}
?>