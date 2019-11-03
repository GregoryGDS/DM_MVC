<?php
require_once(__DIR__.'/../../model/posts/modelPosts.php');

//echo 'ok update';

$reTableau= implode("/", $requestdPage);
$tableau_action= explode('/', $reTableau);
//print_r($tableau_action);

if (in_array("access_update_post", $tableau_action)) {
	//echo "form màj chargé";
	
	require_once (__DIR__ . '/../../view/posts/update_form_post.php');
}
?>

