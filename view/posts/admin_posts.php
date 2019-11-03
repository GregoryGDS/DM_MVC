
<center>
<table border="1" cellpadding="15">
	<tr>
		<th>ID</th>
		<th>Titre</th>
		<th>Auteur</th>
		<th>Catégorie</th>
		<th>Editer</th>
		<th>Supprimer</th>
	</tr>

	<?php
	require_once(__DIR__.'/../../model/categories/modelCategories.php');
	require_once(__DIR__.'/../../model/posts/modelPosts.php');
	require_once(__DIR__.'/../../model/users/modelUsers.php');

	$allPosts=allPosts();

	foreach  ($allPosts as $post) {
		echo "<tr>";
		echo "<td>".$post['id']."</td>";
		echo "<td>".$post['title']."</td>";
		$name_user=getUser($post['idUser']);
		echo "<td>".$name_user['username']."</td>";
		$name_category=getCategory($post['idCategory']);
		echo "<td>".$name_category['name']."</td>";
		echo "<td><a href='/controller/access_update_post?id_post_update=".$post['id']."'><img src='/img/source/edit.jpg' width=50 height=50/></a></td>";
		echo "<td><a href='/controller/delete_post?id_post_update=".$post['id']."'><img src='/img/source/delete.png' width=50 height=50/></a></td>";
	}
	?>
</table>
</center>