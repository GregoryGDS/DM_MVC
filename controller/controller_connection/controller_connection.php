<?php

//echo $_POST['user'];
//echo $_POST['password'];
if (isset($_POST['user'])&&isset($_POST['password']))
{
	if(!empty($_POST['user'])&&!empty($_POST['password']))
	{	
		require_once(__DIR__.'/../../model/users/users.php');
		$current_user=control_connexion($_POST['user'],$_POST['password']);
		if (!empty($current_user))
		{
		/*
			if (password_verify($_POST['password'], $mdp_hash))
			{*/
				$_SESSION['current_user']=$current_user;
				echo "OK ^^";
				//require_once(__DIR__.'/../../index.php');


			?>
<script type="text/javascript">
	function refresh(){
		window.location.href = '/';
	};
	refresh();
</script>
			<?php
			/*}else{
				echo "pb mdp, essayer encore ";
			}*/
			
		}else
		{
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

