<?php
$id=$_GET['farmerid'];
include("connection/db_con.php");
$query=mysql_query("update farmer set stat=0 where farmerid='$id'") or die(mysql_error());
die('<script language=javascript>alert("Account has been deactivated successfully"); location=("admin1.php?page=vd_reg.php"); </script>');
?>
