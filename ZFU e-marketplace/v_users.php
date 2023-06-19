<?php
//session_start();
error_reporting(0);
if(!isset($_SESSION['logged'])){
die('<script language=javascript> location=("index.php");</script>');
}
?>
<form id="form1" name="form1" method="post" action="">
<strong><center>
  <p>ALL SYSTEM USERS</p>
</center></strong>
<table width="100%" border="0">
    <tr>
      <td width="18%" bgcolor="#003300"><strong>Name</strong></td>
      <td width="28%" bgcolor="#003300"><strong>Surname</strong></td>
      <td width="27%" bgcolor="#003300"><strong>Username</strong></td>
      <td width="27%" bgcolor="#003300"><strong>Status</strong></td>
      <td width="54%" bgcolor="#003300"><strong>Action</strong></td>
    </tr>
    <?php
	include("connection/db_con.php");
	$query=mysql_query("select * from admin") or die(mysql_error());
	while($fetch=mysql_fetch_array($query)){
	?>
    <tr>
      <td ><?php echo $fetch['firstname'];?></td>
      <td ><?php echo $fetch['lastname'];?></td>
      <td ><?php echo $fetch['username'];?></td>
      <td ><?php if($fetch['stat']==1) { echo "Active";} elseif($fetch['stat']==0){ echo "Inactive"; } else echo "Active";?></td>
      <td ><?php if($fetch['stat']==1) { echo "<a href=deact_users.php?adminid=$fetch[adminid]>Deactivate</a>";} elseif($fetch['stat']==0){ echo "<a href=act_users.php?adminid=$fetch[adminid]>Activate</a>"; } else echo "Admin";?></td>
    </tr>
    <?php } ?>
  </table>

</form>
