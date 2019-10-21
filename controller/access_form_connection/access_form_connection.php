<?php

$reTableau= implode("/", $requestdPage);
$tableau_action= explode('/', $reTableau);
//print_r($tableau_action);

if (in_array("access_form_connection", $tableau_action)) {
	require_once (__DIR__ . '/../../view/form_connection/form_connection.php');
	//ouvre formulaire de connexion

}