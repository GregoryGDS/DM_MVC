
<div class="container">
	<form method="post" action="/controller/connection/">
		<table border="1" cellpadding="15" class="position_table">
			<tr>
				<td>Nom : <input type="text" name="user"></td>
			</tr>
			<tr>
				<td>Mot de passe : <input type="password" name="password"></td>
			</tr>
			<tr>
				<td>
					<a href=''>mot de passe oublié</a>

					<input type="submit" name="Connexion">
				</td>
			</tr>
			<?php

			if (isset($_SESSION['error_access_connection'])) {
				echo "<tr><td>";
				echo $_SESSION['error_access_connection'];
				echo "</td></tr>";
			}

			?>
		</table>
	</form>
</div>

