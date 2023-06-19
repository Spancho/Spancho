<?php
$id=$_GET['id'];
include("functions.php");
include("connection/db_con.php");
mysql_query("update comments set stat=0");
mysql_query("update comments set stat=1 where id='$id'") or die(mysql_error());
redirectto("admin.php?page=add_comments.php");
?>