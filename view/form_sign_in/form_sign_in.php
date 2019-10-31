<form method="post" action="/controller/sign_in/">
	<table border="1" cellpadding="15" class="position_table">
		<tr>
			<td>Nom : <input type="text" name="newUser" value="<?php if(isset($_POST['newUser'])){echo $_POST['newUser'];}?>
"></td>
		</tr>
		<tr>
			<td>Email : <input type="email" name="newEmail" value="<?php if(isset($_POST['newEmail'])){echo $_POST['newEmail'];}?>
"></td>
		</tr>
		<tr>
			<td>
				Mot de passe : <input type="password" name="password"><br>
				Confirmez le mot de passe : <input type="password" name="checkpass">
			</td>
			
		</tr>
		<tr>
			<td>
				<input type="submit" name="sign_in" value="S'inscrire">
			</td>
		</tr>
		<?php
		if (isset($_SESSION['error_sign_in'])) {
			echo "<tr><td>";
			echo $_SESSION['error_sign_in'];
			echo "</td></tr>";
		}
		?>

	</table>
</form>


