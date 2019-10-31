<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    	<div class="container">
    		<?php
			if (isset($_SESSION['current_user'])) {
				echo '<a class="navbar-brand" href="#">Bonjour '.$_SESSION['current_user'][0]['username'].'</a>';
				echo '<a class="navbar-brand" href="/log_out">Déconnexion</a>';
			}else{
				echo '<a class="navbar-brand" href="#">Exercice MVC</a>';
				echo '<a class="navbar-brand" href="/view/access_form_connection/">Connexion</a>';
			}
    		?>
    	</div>
	</nav>
</header>
