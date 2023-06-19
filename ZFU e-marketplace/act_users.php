<?php
$id=$_GET['adminid'];
include("functions.php");
include("connection/db_con.php");
mysql_query("update admin set stat=1 where adminid='$id'") or die(mysql_error());
redirectto("admin1.php?page=v_users.php");
?>