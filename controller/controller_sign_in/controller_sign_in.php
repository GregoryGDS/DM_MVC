<?php

//echo $_POST['user']."<br>";
//echo $_POST['password']."<br>";
if (isset($_POST['newUser'])&&isset($_POST['newEmail'])&&isset($_POST['password'])&&isset($_POST['checkpass'])){

	if(!empty($_POST['newUser'])&&!empty($_POST['newEmail'])&&!empty($_POST['password'])&&!empty($_POST['checkpass'])){	
		require_once(__DIR__.'/../../model/users/modelUsers.php');

		if(syntaxMail($_POST['newEmail'])){
			require_once(__DIR__.'/../../model/users/modelUsers.php');
			$verifUserName=control_connexion($_POST['newUser']);

			if (isset($verifUserName)&&empty($verifUserName)) {
				$verifMail=control_email($_POST['newEmail']);
				//print_r($verifMail);

				if (empty($verifMail)) {

					if ($_POST['password']===$_POST['checkpass']) {
						
						$password_hash= password_hash($_POST['password'], PASSWORD_DEFAULT);
						sign_in($_POST['newUser'],$_POST['newEmail'],$password_hash);
						//echo "ok sign in ";
						//o, se connecte après s'être inscrit
						$current_user=control_connexion($_POST['newUser']);
						$_SESSION['current_user']=$current_user;
						?>
						<script type="text/javascript">
							function refresh(){
								window.location.href = '/';
							};
							refresh();
						</script>
						<?php
					}else{//verif mdp
						$_SESSION['error_sign_in']="Les mots de passe ne sont pas identique";
						require_once (__DIR__ . '/../../view/form_sign_in/form_sign_in.php');	
					}
				}else{//verifMail
					$_SESSION['error_sign_in']="Email déjà existant ;-;";
					require_once (__DIR__ . '/../../view/form_sign_in/form_sign_in.php');
				}
			}else{//verifUserName
				$_SESSION['error_sign_in']="Nom utilisateur déjà existant, choisissez en un nouveau";
				require_once (__DIR__ . '/../../view/form_sign_in/form_sign_in.php');				
			}
		}else{//syntaxMail
			$_SESSION['error_sign_in']="Email mal renseigné";
			require_once (__DIR__ . '/../../view/form_sign_in/form_sign_in.php');		
		}
	}else{
		$_SESSION['error_sign_in']="Remplir TOUS les champs ><";
		require_once (__DIR__ . '/../../view/form_sign_in/form_sign_in.php');
	}
}else{
	$_SESSION['error_sign_in']="oups";
	require_once (__DIR__ . '/../../view/form_sign_in/form_sign_in.php');	
}

