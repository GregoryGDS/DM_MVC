<?php
require_once 'model/posts/modelPosts.php';
require_once 'model/users/modelUsers.php';

$infoDuPost=explode('&',$requestdPage[1]);
$idpost=explode('=',$infoDuPost[0]);
$user=explode('=', $infoDuPost[1]);
//print_r($idpost);
$post=getPost($idpost[1]);
//print_r($post);
$username=getUser($post['idUser']);
//print_r($username);

//lors du rappel de la page après ajout et suppression de commentaire empèche les valeurs insérées dans le le post de changer par l'id du commentaire 
if (in_array("idPost", $idpost)&&in_array("idUser", $user)) {
	//echo "good <br>";
	$_SESSION['post']=getPost($idpost[1]);
	//print_r($_SESSION['post']);
	echo"<br>";
	$_SESSION['username']=getUser($_SESSION['post']['idUser']);
	//print_r($_SESSION['username']);
}else{
	//echo "not good";
}

?>

<h2 class="m-4">
 	<p class="nav-item"><?php echo $_SESSION['post']['title'];?></p>
</h2>
<h6 class="m-4">
 	<p class=" nav-item">De <?php echo $_SESSION['username']['username'];?></p>
</h6>
<div class="row">
		<div class="col-md">
			<img class="card-img-top" src="../../<?php echo $_SESSION['post']["imagePath"];?>">
		</div>  
		<div class="col-md m-5">
				<h5>Description : </h5>
				<p class="card-text"><?php echo $_SESSION['post']['content'];?></p>
		</div>

</div>
<hr>

<?php
require_once ('view/comment/postComment.php');

require_once ('view/comment/newComment.php');
?>

