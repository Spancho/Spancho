<?php
	@session_start();
	$username=$_SESSION['username'];
	include_once("connection/db_con.php");
	$sql = "insert into chat values('null', ".time().", '".$username."','".$_REQUEST["chat"]."')";
	mysql_query($sql);	

?>