<?php

require_once 'model/comments/modelComments.php';
$allCommentPost=getComments($_SESSION['post']['id']);
//print_r($allCommentPost);
?>
<h2 class="comment-title">Vos Commentaires</h2>

<div class="col-lg-12">

	<?php
	if (!empty($allCommentPost)) {
		foreach ($allCommentPost as $comment) {
			echo "<div class='row'>";
			echo 	"<div class='col-lg-10'>";
			echo 		'<div class="col-lg-12">';
							$commentAuthor=getUser($comment['idAuthor']);
			echo 			'<p><strong>Auteur : </strong>'.$commentAuthor['username'].'</p>';
			echo 		'</div>';
			echo 		'<div>';
			echo 			'<div class="col-lg-12">';
			echo 				'<p>'.$comment['content'].'</p>';
			echo 			'</div>';
			echo 		'</div>';
			echo 	"</div>";
			if (isset($_SESSION['current_user'])) {
				echo 	"<div class='col-lg-2'>";
				echo 		"<a href='/controller/delete_comment?id_comment_delete=".$comment['id']."'><img src='/img/source/delete.png' ></a>";
				echo 	"</div>";
			}
			echo "</div>";
			echo "<hr>";
		}

	}else{
		echo "Aucun commentaire ...";
	}
	
	?>

</div>
