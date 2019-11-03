<?php

require_once(__DIR__.'/../../model/categories/modelCategories.php');

$reTableau= implode("/", $requestdPage);
$tableau_action= explode('/', $reTableau);
//print_r($tableau_action);

if (in_array("addCategory", $tableau_action)) {
	$addCategory=strtoupper(htmlspecialchars($_POST['category']));
	//echo $addCategory;
	$verifCategory=verifCategory($addCategory);
	//print_r($verifCategory);
	if (empty($verifCategory)) {
		//echo 'dedans';
		addCategory($addCategory);
		$messageCategory='Catégorie ajoutée';
		
	}else{
		$messageCategory= 'Catégorie déjà existante';
	}
	require_once (__DIR__ . '/../../view/categories/admin_categories.php');
}

?>