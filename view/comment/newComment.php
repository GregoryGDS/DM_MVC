
<!--impossible de mettre un commentaire si non inscrit-->
<h2 class="comment-title">Ecrire un commentaire</h2>

<?php

if (isset($_SESSION['current_user'])) {
?>
	<div class="row">
	    <div class="col-lg-8">

	        <form action="/controller/new_comment" method="post" enctype="multipart/form-data">
	             <div class="form-group">
	                <label>Commentaire :</label>
	                <textarea id="postContent" class="form-control" name="content" rows="5" required><?php if(isset($_POST['content'])){echo $_POST['content'];}?></textarea>
	            </div>
	            <button id="postButton" type="submit" class="btn btn-secondary">Ajouter</button>
	        </form>
	        <?php
	        if (isset($message)) {
	            echo $message;
	        }
	        ?>
	    </div>
	</div>
<?php
}else{
	echo "Pour écrire un commentaire merci de vous connecter :)";
}
?>