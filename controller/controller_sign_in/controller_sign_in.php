<?php

//echo $_POST['user']."<br>";
//echo $_POST['password']."<br>";
if (isset($_POST['newUser'])&&isset($_POST['newEmail'])&&isset($_POST['password'])&&isset($_POST['checkpass'])){

	if(!empty($_POST['newUser'])&&!empty($_POST['newEmail'])&&!empty($_POST['password'])&&!empty($_POST['checkpass'])){	

		require_once(__DIR__.'/../../model/users/users.php');
		if(syntaxMail($_POST['newEmail'])){

			$verifMail=control_email($_POST['newEmail']);
			//print_r($verifMail);
			if (empty($verifMail)) {
				if ($_POST['password']===$_POST['checkpass']) {
					$password_hash= password_hash($_POST['password'], PASSWORD_DEFAULT);
					sign_in($_POST['newUser'],$_POST['newEmail'],$password_hash);
					echo "ok sign in ";
				}else{
					$_SESSION['error_sign_in']="Les mots de passe ne sont pas identique";
					require_once (__DIR__ . '/../../view/form_sign_in/form_sign_in.php');	
				}
			}else{
				$_SESSION['error_sign_in']="Email déjà existant ;-;";
				require_once (__DIR__ . '/../../view/form_sign_in/form_sign_in.php');
			}			
		}else{
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

