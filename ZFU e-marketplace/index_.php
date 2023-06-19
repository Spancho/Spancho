<?php
session_start();
error_reporting(0);
include("connection/db_con.php");
$c=1;
$d=date('Y-m-d');
mysql_query("insert into statistics(dat,vtype,cnt) values('$d','Home Page Visits','$c')") or die(mysql_error());

if(isset($_SESSION['logged'])){
session_destroy();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body{
background-image: url(pics/bg.jpg);
}
#container {
width: 960px;
margin-left: auto;
margin-right: auto;
text-align: left;  
border: 1px solid #ccc; 
margin-top: auto;
margin-bottom: auto;
background:#FFF; 
-webkit-box-shadow: 10px 15px 10px #000;  
-moz-box-shadow: 10px 15px 10px #000;  
-ms-box-shadow: 10px 15px 10px #000;  
box-shadow: 10px 15px 10px #000; 
padding:0;
}
-->
</style>
</head>
<div id="container">
<form name="home" method="post" action="" enctype="multipart/form-data">
<body>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><?php include("banner.php"); ?></td>
    </tr>
    <tr>
      <td><?php include("homemenu.html"); ?></td>
    </tr>
    <tr>
      <td>
      &nbsp;
	  <?php
$pg = @$_REQUEST['page'];
if($pg != "" && file_exists(dirname(__FILE__)."/".$pg)){
require(dirname(__FILE__)."/".$pg);
}elseif(!file_exists(dirname(__FILE__)."/".$pg))
include_once(dirname(__FILE__)."/pages/404.php");
else{
include_once("default.php");
}
?></td>
    </tr>
    <tr>
      <td>
	  <?php include("footer.php"); ?></td>
    </tr>
  </table>

</body>
</form
</div>
</html>