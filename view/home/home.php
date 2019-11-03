<?php
//echo "Hello :)";
require_once 'model/posts/modelPosts.php';
require_once 'model/users/modelUsers.php';//pour récupérer le nom de celui qui a écrit le post
require_once 'model/categories/modelCategories.php';//pour récupérer le nom de la catégorie
//$userPost=getUser(5);
//print_r($userPost);

$postParPage=10;
$nombreTotalPost=numberPost();
$pagesTotales=ceil($nombreTotalPost/$postParPage);
//ceil -> arrondie à l'entier supérieur
if (isset($_GET['page'])&&!empty($_GET['page'])&&$_GET['page']>0 &&$_GET['page']<=$pagesTotales) {
	$numeroPage=htmlspecialchars($_GET['page']);
	$current_page=intval($numeroPage);
}else{
	$current_page=1;
}

$debut=($current_page-1)*$postParPage;

$listPosts = allPosts($debut,$postParPage);
//print_r($listPosts);

?>
<nav>
  <ul class="pagination pagination-lg">
<?php
for ($i=1; $i <= $pagesTotales ; $i++) { 
?>						  
    <li class="page-item <?php if($i===$current_page){echo 'disabled';}?>">
      <a class="page-link" href="/?page=<?php echo $i; ?>" ><?php echo $i; ?></a>
    </li>
<?php
}
?>
  </ul>
</nav>

<div class="row">
	<?php
	foreach ($listPosts as $post){
		$userPost=getUser($post["idUser"]);
		$postCategory=getCategory($post['idCategory']);
	?>
		<div class="col-lg-6 col-md-6 mb-4">
			<div class="card h-100">
			 	<a href='/controller/post_access?idPost=<?php echo $post["id"];?>&idUser=<?php echo $post["idUser"];?>'><img class="card-img-top" src="<?php echo $post["imagePath"];?>"></a>
				<div class="card-body">
				    <h4 class="card-title">
			      		<a href='/controller/post_access?idPost=<?php echo $post["id"];?>&idUser=<?php echo $post["idUser"];?>'><?php echo $post['title'];?></a>
			    	</h4>
			    	<h6 class="card-title">
			      		<?php echo $post['content'];?>
			    	</h6>
			    	<hr>
			    	<h6>De <?php echo $userPost['username'];?></h6>
			    	<hr>
			    	<h6>Catégorie : <?php echo $postCategory['name'];?></h6>
			  	</div>			  
			</div>
		</div>
	<?php
	}
	?>
</div>
<nav>
  <ul class="pagination pagination-lg">
<?php
for ($i=1; $i <= $pagesTotales ; $i++) { 
?>						  
    <li class="page-item <?php if($i===$current_page){echo 'disabled';}?>">
      <a class="page-link" href="/?page=<?php echo $i; ?>" ><?php echo $i; ?></a>
    </li>
<?php
}
?>
  </ul>
</nav>