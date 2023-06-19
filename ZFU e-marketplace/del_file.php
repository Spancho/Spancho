<?php
$id=$_GET['id'];
include("functions.php");
include("connection/db_con.php");
$query=mysql_query("select fn from docs where id='$id'") or die(mysql_error());
$fetch=mysql_fetch_array($query);
$dn=$fetch['fn'];
mysql_query("delete from docs where id='$id'") or die(mysql_error());
redirectto("admin1.php?page=forms_upload.php");
?>