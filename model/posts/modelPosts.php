<?php

require_once(__DIR__.'/../../model/functionBD.php');

function numberPost(){
	$co_db=connect();
	$sql=$co_db->prepare("SELECT id FROM posts");
	$sql->execute();
	$numberPost=$sql->rowCount();
	return $numberPost;
}

function allPosts($debut=0,$postParPage=null){
	//pour gérer la pagination
	if ($postParPage===null) {
		$postParPage=numberPost();
	}
	$co_db=connect();
	$sql=$co_db->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT :debut,:postParPage");
	$sql->bindValue("debut","$debut",PDO::PARAM_INT);
	$sql->bindValue("postParPage","$postParPage",PDO::PARAM_INT);
	$sql->execute();
	$allPosts=$sql->fetchAll(PDO::FETCH_ASSOC);
	return $allPosts;
}

function getPost($idPost){
	$co_db=connect();
	$sql=$co_db->prepare("SELECT * FROM posts WHERE id=:idPost");
	$sql->bindValue("idPost","$idPost",PDO::PARAM_INT);
	$sql->execute();
	$post=$sql->fetch(PDO::FETCH_ASSOC);
	return $post;
}

function addPost($imgPath,$title,$content,$idCategory,$idUser){
	$co_db=connect();
    $sql = $co_db->prepare('INSERT INTO posts(imagePath,title,content,idCategory,idUser) VALUES(:img,:title,:content,:idCategory,:idUser)');
	$sql->bindValue("img","$imgPath");
	$sql->bindValue("title","$title",PDO::PARAM_STR);
	$sql->bindValue("content","$content",PDO::PARAM_STR);
	$sql->bindValue("idCategory","$idCategory",PDO::PARAM_INT);
	$sql->bindValue("idUser","$idUser",PDO::PARAM_INT);
	$sql->execute();
}

function updatePostImage($idPost,$imgPath,$title,$content,$idCategory,$idUser)
{
    $co_db = connect();

    $sql = $co_db->prepare('UPDATE posts SET imagePath=:imgPath, title=:title, content=:content, idCategory=:category, idUser=:user WHERE id=:idPost');
    $sql->bindValue("imgPath","$imgPath");
	$sql->bindValue("title","$title",PDO::PARAM_STR);
	$sql->bindValue("content","$content",PDO::PARAM_STR);
	$sql->bindValue("category","$idCategory",PDO::PARAM_INT);
	$sql->bindValue("user","$idUser",PDO::PARAM_INT);
	$sql->bindValue("idPost","$idPost",PDO::PARAM_INT);
    $updatePost = $sql->execute();
    return $updatePost;
}

function updatePostNoImg($idPost,$title,$content,$idCategory,$idUser)
{
    $co_db = connect();
    $sql = $co_db->prepare('UPDATE posts SET title=:title, content=:content, idCategory=:category, idUser=:user WHERE id=:idPost');
	$sql->bindValue("title","$title",PDO::PARAM_STR);
	$sql->bindValue("content","$content",PDO::PARAM_STR);
	$sql->bindValue("category","$idCategory",PDO::PARAM_INT);
	$sql->bindValue("user","$idUser",PDO::PARAM_INT);
	$sql->bindValue("idPost","$idPost",PDO::PARAM_INT);
    $updatePost = $sql->execute();
    return $updatePost;
}

function delete_post($idPost) 
{
    $co_db = connect();
    $sql = $co_db->prepare("DELETE FROM posts WHERE id=:idDel");
    $sql->bindValue("idDel","$idPost",PDO::PARAM_INT);
    $sql->execute();
}

function uploadImage_path($file,$edit=null){
	$imagePath=[];
	if ($file['error']) {  
		switch ($file['error']){  
			case 1: // UPLOAD_ERR_INI_SIZE  
				$message = "La taille de l'image est trop grande";
				//La taille du fichier est plus grande que la limite autorisée par le serveur (paramètre upload_max_filesize du fichier php.ini).
				break;  
			case 2: // UPLOAD_ERR_FORM_SIZE  
				$message = "La taille de l'image est trop grande";
				//La taille du fichier est plus grande que la limite autorisée par le formulaire (paramètre post_max_size du fichier php.ini).
				break;  
			case 3: // UPLOAD_ERR_PARTIAL  
				$message = "L'envoi du fichier a été interrompu pendant le transfert.";
				break;  
			case 4: // UPLOAD_ERR_NO_FILE  
				$message = "La taille du fichier que vous avez envoyé est nulle."; 
				break;  
		}  
	}else {  
		if ((isset($file['name'])&&($file['error'] == UPLOAD_ERR_OK))) { 
			$destination = 'img/BDD/'; 
			//déplacement du fichier du répertoire temporaire (stocké par défaut) dans le répertoire de destination 
			move_uploaded_file($file['tmp_name'], $destination.$file['name']);
			if ($edit==='edit') {
				$message = "Le fichier ".$file['name']." a été copié et le post mit à jour";
			}else{
				$message = "Le fichier ".$file['name']." a été copié et le post créé"; 
				//$message = "Le fichier ".$file['name']." a été copié dans le répertoire img"; 			
			}
		} 
		else { 
			$message = "Le fichier n'a pas pu être copié"; 
			return $message;
		}
		//si tous ce passe bien
		$imagePath = array('imagePath'=>$destination.$file['name'] );
	}

	$retour = array('message' =>$message);
	if (!empty($imagePath)) {
		$retour=array_merge($retour,$imagePath);
	}
	return $retour;
	
}

?>