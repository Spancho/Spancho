<?php
	@session_start();
	$_SESSION['user_id'] = 0;
	$_SESSION['username'] = 0;
	$_SESSION['level'] = 0;
	$_SESSION['logged_in'] = false;
	
?>
<script language="javascript">
	location = 'login.php';
</script>