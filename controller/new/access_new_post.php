<?php

$reTableau= implode("/", $requestdPage);
$tableau_action= explode('/', $reTableau);
//print_r($tableau_action);

if (in_array("access_new_post", $tableau_action)) {
	//echo "access_new_post";
	require_once (__DIR__ . '/../../view/posts/new_post.php');
	//ouvre formulaire d'inscription

}