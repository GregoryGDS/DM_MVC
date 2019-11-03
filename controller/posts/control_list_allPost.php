<?php

$reTableau= implode("/", $requestdPage);
$tableau_action= explode('/', $reTableau);
//print_r($tableau_action);
if (in_array("access_all_post", $tableau_action)) {
	require_once (__DIR__ . '/../../view/posts/admin_posts.php');
}