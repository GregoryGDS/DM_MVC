<?php

require_once(__DIR__.'/../../model/functionBD.php');

function getComments($idPost){
	$co_db=connect();
	$sql=$co_db->prepare("SELECT * FROM comments WHERE idPost=:idPost ORDER BY idPost DESC");
	$sql->bindValue("idPost","$idPost",PDO::PARAM_INT);
	$sql->execute();
	$comments=$sql->fetchAll(PDO::FETCH_ASSOC);
	return $comments;
}

function delete_comment($idComment) 
{
    $co_db = connect();
    $sql = $co_db->prepare("DELETE FROM comments WHERE id=:idDel");
    $sql->bindValue("idDel","$idComment",PDO::PARAM_INT);
    $sql->execute();
}

function add_comment($idAuthor,$content,$idPost) 
{
	$co_db=connect();
    $sql = $co_db->prepare('INSERT INTO comments(content,idPost,idAuthor) VALUES(:content,:post,:author)');
	$sql->bindValue("content","$content",PDO::PARAM_STR);
	$sql->bindValue("post","$idPost",PDO::PARAM_INT);
	$sql->bindValue("author","$idAuthor",PDO::PARAM_INT);
	$sql->execute();
}

?>