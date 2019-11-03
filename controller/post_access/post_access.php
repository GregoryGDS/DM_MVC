<?php

$reTableau= implode("/", $requestdPage);
$tableau_action= explode('/', $reTableau);
//print_r($tableau_action);
if (in_array("post_access", $tableau_action)) {
	require_once (__DIR__ . '/../../view/posts/post.php');
}