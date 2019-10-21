<?php

require_once(__DIR__.'/../../model/functionBD.php');

function control_connexion($name,$password){
	$co_db=connect();
	$sql=$co_db->prepare("SELECT * FROM users WHERE username=':name' AND password=':password'");
	$sql->bindValue("name","$name",PDO::PARAM_STR);
	$sql->bindValue("password","$password",PDO::PARAM_STR);
	$sql->execute();
	$info_user=$sql->fetchAll(PDO::FETCH_ASSOC);
	return $info_user;
}