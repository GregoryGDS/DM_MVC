<?php

$reTableau= implode("/", $requestdPage);
$tableau_action= explode('/', $reTableau);
//print_r($tableau_action);

if (in_array("FormNew_user", $tableau_action)) {
	//echo "access_form_new_user";
	require_once (__DIR__ . '/../../view/form_sign_in/form_sign_in.php');
	//ouvre formulaire d'inscription

}