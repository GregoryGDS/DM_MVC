
<center>
	<form method="post" action="/controller/addCategory/">
		<center><!--à modifier avec css-->
			<table border="1" cellpadding="15" class="position_table">
				<tr>
					<td colspan="2"><center>Ajouter une nouvelle catégorie</center></td>
				</tr>
				<tr>
					<td>Nom Catégorie:</td><td><input type="text" name="category" value="<?php if(isset($addCategory)){echo $addCategory;}?>"></td>
				</tr>
				<tr>
					<td colspan="2"><center><input type="submit" name="addCategory" value="Ajouter">
					<?php
				        if (isset($messageCategory)) {
				            echo "<br>".$messageCategory;
				        }
				        ?>
				       	</center>
				    </td>
				</tr>
			</table>
		</center>
	</form>

	<br>

	<table border="1" cellpadding="15">
		<tr>
			<th>ID</th>
			<th>Nom</th>
			<th>Supprimer</th>
		</tr>

		<?php
		require_once(__DIR__.'/../../model/categories/modelCategories.php');

		$categories=allCategories();

		foreach  ($categories as $category) {
			echo "<tr>";
			echo "<td>".$category['id']."</td>";
			echo "<td>".$category['name']."</td>";
			echo "<td><a href='/controller/delete_category?id_category_delete=".$category['id']."'><img src='/img/source/delete.png' width=50 height=50/></a></td>";
		}
		?>
	</table>
</center>