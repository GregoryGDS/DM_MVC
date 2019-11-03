<?php
require_once(__DIR__.'/../../model/categories/modelCategories.php');
$categories=allCategories();
?>
<h1>Nouvel article</h1>

<div class="row">
    <div class="col-lg-8">

        <form action="/controller/form_new_post" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Titre de l'article:</label>
                <input type="text" class="form-control" name="title" value='<?php if(isset($_POST['title'])){echo $_POST['title'];}?>' required><!--<?php /*if(isset()){} */?>-->
            </div>
            <div class="form-group">
                <label for="categorie">Categorie</label>
                <select name="categorie" class="form-control">
                    <?php
                    foreach($categories as $categorie){
                    ?>
                    <option value="<?php echo $categorie['id'];?>" <?php if (isset($_POST['categorie'])&&$categorie['id']===$_POST['categorie']) {echo 'selected';}?> ><?php echo $categorie['name']; ?></option> 
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Description :</label>
                <textarea id="postContent" class="form-control" name="content" rows="10"required><?php if(isset($_POST['content'])){echo $_POST['content'];}?></textarea><!--<?php /*if(isset()){} */?>-->
            </div>
            <div class="form-group">
                <p>Choisissez une photo avec une taille inférieure à 2 Mo.</p> 
                <input type="file" name="picture">
            </div>
            <button id="postButton" type="submit" class="btn btn-secondary">Ajouter</button>
        </form>
        <?php
        if (isset($etat)) {
            echo $etat;
        }
        ?>
    </div>
</div>

