<?php 
require_once 'model/functionStu.php';

$action= explode("=",$requestdPage[1]);

if ($action[1]=="listeStu") {
	$listeS=listeS();
	print_r($listeS);
	require_once __DIR__ . '/../view/list.php';

}