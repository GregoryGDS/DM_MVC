<?php
require_once(__DIR__.'/../../model/categories/modelCategories.php');
require_once(__DIR__.'/../../model/posts/modelPosts.php');
require_once(__DIR__.'/../../model/users/modelUsers.php');

if ($_GET['id_post_update']) {//première ouverture
    $editPost=getPost($_GET['id_post_update']);
}else{
    $editPost=getPost($idPost);
    //on redirige sur cette page après une màj donc on lui redonne l'id du post car le get n'existe plus
}

$user=getUser($editPost['idUser']);

$categories=allCategories();
?>

<h1>Edit post : <?php echo $editPost['title']?></h1>

<div class="row">
    <div class="col-lg-8">

        <form action="/controller/update_post" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idPost" value="<?php echo $editPost['id']; ?>">
            <div class="form-group">
                <label>Titre de l'article:</label>
                <input type="text" class="form-control" name="title" value='<?php echo $editPost['title']; ?>' required><!--<?php /*if(isset()){} */?>-->
            </div>
            <div class="form-group">
                <label>Auteur:</label>
                <input type="text" class="form-control" name="username" value='<?php echo $user['username']; ?>' required><!--<?php /*if(isset()){} */?>-->
            </div>
            <div class="form-group">
                <label for="categorie">Categorie</label>
                <select name="categorie" class="form-control">
                    <?php
                    foreach($categories as $categorie){
                    ?>
                    <option value="<?php echo $categorie['id'];?>" <?php if ($categorie['id']===$editPost['idCategory']) {echo 'selected';}?> ><?php echo $categorie['name']; ?></option> 
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Description :</label>
                <textarea id="postContent" class="form-control" name="content" rows="10"required><?php echo $editPost['content'];?></textarea><!--<?php /*if(isset()){} */?>-->
            </div>
            <div class="form-group">
                <p>Choisissez une photo avec une taille inférieure à 2 Mo.</p> 
                <input type="file" name="picture" value="<?php echo $editPost['imagePath']; ?>">
            </div>
            <button id="postButton" type="submit" class="btn btn-secondary">Mettre à jour</button>
        </form>
        <?php
        if (isset($messageUpdate)) {
            echo $messageUpdate;
        }
        ?>
    </div>
    <div class="col">
        <img class="card-img-top" src="../<?php echo $editPost["imagePath"];?>">
    </div>
</div>