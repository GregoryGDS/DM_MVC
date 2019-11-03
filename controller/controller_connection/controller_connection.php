<?php

//echo $_POST['user']."<br>";
//echo $_POST['password']."<br>";
$user=htmlspecialchars($_POST['user']);
$password=htmlspecialchars($_POST['password']);
if (isset($user)&&isset($password)){

	if(!empty($user)&&!empty($password)){	

		require_once(__DIR__.'/../../model/users/modelUsers.php');
		$current_user=control_connexion($user);
		print_r($current_user);
		//print_r(allUsers());
		if (!empty($current_user)){

			if (password_verify($password,$current_user['password'])){
				$_SESSION['current_user']=$current_user;
				echo "OK ^^";
			?>
			<script type="text/javascript">
				function refresh(){
					window.location.href = '/';
				};
				refresh();
			</script>
			<?php
			}else{
				$_SESSION['error_access_connection']="pb mdp, essayer encore :/";
				require_once (__DIR__ . '/../../view/form_connection/form_connection.php');
			}
			
		}else{
			$_SESSION['error_access_connection']="User inconnu :p";
			require_once (__DIR__ . '/../../view/form_connection/form_connection.php');
		}
	}else{
		$_SESSION['error_access_connection']="Remplir champs ><";
		require_once (__DIR__ . '/../../view/form_connection/form_connection.php');
	}
}else{
	$_SESSION['error_access_connection']="oups";
	require_once (__DIR__ . '/../../view/form_connection/form_connection.php');	
}

