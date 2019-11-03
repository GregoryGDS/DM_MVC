<?php

$reTableau= implode("/", $requestdPage);
$tableau_action= explode('/', $reTableau);
//print_r($tableau_action);
if (in_array("access_all_categories", $tableau_action)) {
	require_once (__DIR__ . '/../../view/categories/admin_categories.php');
}