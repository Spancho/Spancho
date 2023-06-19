<?php
//session_start();
error_reporting(0);
if(!isset($_SESSION['logged'])){
die('<script language=javascript> location=("index.php");</script>');
}
?>
<table width="80%" cellspacing="1" cellpadding="3">
  <tr bgcolor="#004000">
    <td>Co. Name</td>
    <td>Location</td>
    <td>Phone</td>
    <td>Address</td>
    <td>Email</td>
    <td>Type</td>
  </tr>
  <?php 
include("functions.php");
include("connection/db_con.php");
$query=mysql_query("SELECT * FROM companies Where type='buyer'") or die(mysql_error());
while($fetch=mysql_fetch_array($query)){ 
?>
  <tr bgcolor="#80FF80">
    <td><?php echo $fetch["name"];?></td>
    <td><?php echo $fetch["location"];?></td>
    <td><?php echo $fetch["phone"];?></td>
    <td><?php echo $fetch["address"];?></td>
    <td><?php echo $fetch["email"];?></td>
    <td><?php echo $fetch["type"];?></td>
  </tr>
 <?php  }?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
