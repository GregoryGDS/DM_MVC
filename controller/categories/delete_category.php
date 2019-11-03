<?php
require_once(__DIR__.'/../../model/categories/modelCategories.php');

$reTableau= implode("/", $requestdPage);
$tableau_action= explode('/', $reTableau);
//print_r($tableau_action);

if (in_array("delete_category", $tableau_action)) {
	$endCategory=htmlspecialchars($_GET['id_category_delete']);
	//echo $endCategory;
	delete_category($endCategory);
	require_once (__DIR__ . '/../../view/categories/admin_categories.php');
}
?>