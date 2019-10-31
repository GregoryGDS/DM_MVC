<form method="post" action="/controller/connection/">
	<center><!--à modifier avec css-->
		<table border="1" cellpadding="15" class="position_table">
			<tr>
				<td>Nom :</td><td><input type="text" name="user"></td>
			</tr>
			<tr>
				<td>Mot de passe : </td><td><input type="password" name="password"></td>
				<td>Vous n'avez pas de compte ?<br><a href="/FormNew_user">Inscription</a></td>
			</tr>
			<tr>
				<td>
					<a href=''>mot de passe oublié</a></td><td>
					<input type="submit" name="Connection" value="Connexion">
				</td>
			</tr>
			<?php
			if (isset($_SESSION['error_access_connection'])) {
				echo "<tr><td colspan='2'>";
				echo $_SESSION['error_access_connection'];
				echo "</td></tr>";
			}
			?>
		</table>
	</center>
</form>


