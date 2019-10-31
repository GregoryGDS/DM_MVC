<?php

require_once(__DIR__.'/../../model/functionBD.php');

function allUsers(){
	$co_db=connect();
	$sql=$co_db->prepare("SELECT * FROM users");
	$sql->execute();
	$allUsers=$sql->fetchAll(PDO::FETCH_ASSOC);
	return $allUsers;
}

function control_connexion($name){//username unique dans la BDD
	$co_db=connect();
	$sql=$co_db->prepare("SELECT * FROM users WHERE username=:name");
	$sql->bindValue("name","$name",PDO::PARAM_STR);
	$sql->execute();
	$info_user=$sql->fetchAll(PDO::FETCH_ASSOC);
	return $info_user;
}

function control_email($email){
	$co_db=connect();
	$sql=$co_db->prepare("SELECT * FROM users WHERE email=:email");
	$sql->bindValue("email","$email");
	$sql->execute();
	$mail=$sql->fetchAll(PDO::FETCH_ASSOC);
	return $mail;
}

function syntaxMail($mail){
	if (preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ", $mail)) {
		return True;
	}
}

function sign_in($name,$email,$passhash){
	$co_db=connect();
    $sql = $co_db->prepare('INSERT INTO users(username, email, password) VALUES(:username, :email,:password)');
	$sql->bindValue("username","$name");
	$sql->bindValue("email","$email");
	$sql->bindValue("password","$passhash");
	$sql->execute();	
}


