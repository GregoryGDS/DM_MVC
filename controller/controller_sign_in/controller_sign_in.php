<?php

//echo $_POST['user']."<br>";
//echo $password."<br>";
$newUser=htmlspecialchars($_POST['newUser']);
$newEmail=htmlspecialchars($_POST['newEmail']);
$password=htmlspecialchars($_POST['password']);
$checkpass=htmlspecialchars($_POST['checkpass']);
if (isset($newUser)&&isset($newEmail)&&isset($password)&&isset($checkpass)){

	if(!empty($newUser)&&!empty($newEmail)&&!empty($password)&&!empty($checkpass)){	
		require_once(__DIR__.'/../../model/users/modelUsers.php');

		if(syntaxMail($newEmail)){
			require_once(__DIR__.'/../../model/users/modelUsers.php');
			$verifUserName=control_connexion($newUser);

			if (isset($verifUserName)&&empty($verifUserName)) {
				$verifMail=control_email($newEmail);
				//print_r($verifMail);

				if (empty($verifMail)) {

					if ($password===$checkpass) {
						
						$password_hash= password_hash($password, PASSWORD_DEFAULT);
						sign_in($newUser,$newEmail,$password_hash);
						//echo "ok sign in ";
						//o, se connecte après s'être inscrit
						$current_user=control_connexion($newUser);
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

