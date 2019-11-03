<?php

require_once(__DIR__.'/../../model/functionBD.php');

function allCategories(){
	$co_db=connect();
	$sql=$co_db->prepare("SELECT * FROM categories ORDER BY id");
	$sql->execute();
	$allCategories=$sql->fetchAll(PDO::FETCH_ASSOC);
	return $allCategories;
}

function getCategory($idCategory){
	$co_db=connect();
	$sql=$co_db->prepare("SELECT * FROM categories WHERE id=:idCategory");
	$sql->bindValue("idCategory","$idCategory",PDO::PARAM_INT);
	$sql->execute();
	$category=$sql->fetch(PDO::FETCH_ASSOC);
	return $category;
}

function verifCategory($nameCategory){
	$co_db=connect();
	$sql=$co_db->prepare("SELECT * FROM categories WHERE name=:nameCategory");
	$sql->bindValue("nameCategory","$nameCategory",PDO::PARAM_STR);
	$sql->execute();
	$category=$sql->fetch(PDO::FETCH_ASSOC);
	return $category;
}

function addCategory($nameCategory){
	$co_db=connect();
    $sql = $co_db->prepare('INSERT INTO categories(name) VALUES(:name)');
	$sql->bindValue("name","$nameCategory");
	$sql->execute();
}

function delete_category($idCategory) 
{
    $co_db = connect();
    $sql = $co_db->prepare("DELETE FROM categories WHERE id=:idDel");
    $sql->bindValue("idDel","$idCategory");
    $sql->execute();
}

?>