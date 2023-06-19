<?php
//session_start();
error_reporting(0);
if(!isset($_SESSION['logged'])){
die('<script language=javascript> location=("index.php");</script>');
}
?>
<form id="form1" name="form1" method="post" action="">
&nbsp;
  <table width="80%" border="0">
    <tr bgcolor="#FF9966">
      <td width="13%" bgcolor="#003300"><strong>Full Name </strong></td>
     <!-- <td width="15%" bgcolor="#003300"><strong>Last Name</strong></td>-->
      <td width="9%" bgcolor="#003300"><strong>Location</strong></td>
      <!--<td width="9%" bgcolor="#003300"><strong>Sex </strong></td>-->
      <td width="14%" bgcolor="#003300"><strong>E-Mail</strong></td>
      <td width="19%" bgcolor="#003300"><strong>Address</strong></td>
      <td width="12%" bgcolor="#003300"><strong>Cell</strong></td>
      <td width="8%" bgcolor="#003300"><strong>Action</strong></td>
    </tr>
	<?php
	include("connection/db_con.php");
	$query=mysql_query("SELECT * FROM farmer") or die(mysql_error());
	while($fetch=mysql_fetch_array($query)){

	?>
    <tr>
      <td><?php echo $fetch['firstname']."  ".$fetch['lastname']; ?></td>
     <!-- <td><?php //echo $fetch['lastname']; ?></td>-->
      <td><?php echo $fetch['location']; ?></td>
    <!--  <td><?php // echo $fetch['gender']; ?></td>-->
      <td><?php echo $fetch['email']; ?></td>
      <td><?php echo $fetch['address']; ?></td>
      <td><?php echo $fetch['mobile']; ?></td>
      <td><?php if($fetch['stat']==1) { echo "<a href=del_reg.php?farmerid=$fetch[farmerid]>Deactivate</a>";} elseif($fetch['stat']==0){ echo "<a href=act_reg.php?farmerid=$fetch[farmerid]>Activate</a>"; } else echo "Unknown";?></td>
    </tr>
	<?php } ?>
  </table>
 
</form>

