<?php

$reTableau= implode("/", $requestdPage);
$tableau_action= explode('/', $reTableau);
//print_r($tableau_action);

if (in_array("log_out", $tableau_action)) {
	session_destroy();
?>
<script type="text/javascript">
	function refresh(){
		window.location.href = '/';
	};
	refresh();
</script>
<?php
}