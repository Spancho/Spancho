<?php
//session_start();
error_reporting(0);
if(!isset($_SESSION['logged'])){
die('<script language=javascript> location=("index.php");</script>');
}
?>
<form id="form1" name="form1" method="post" action="">
&nbsp;
  <table width="100%" border="0">
    <tr bgcolor="#FF9966">
      <td width="14%" bgcolor="#003300"><strong>Fisrt Name </strong></td>
      <td width="12%" bgcolor="#003300"><strong>Last Name</strong></td>
      <td width="10%" bgcolor="#003300"><strong>Reg Date</strong></td>
      <td width="8%" bgcolor="#003300"><strong>Sex </strong></td>
      <td width="13%" bgcolor="#003300"><strong>E-Mail</strong></td>
      <td width="20%" bgcolor="#003300"><strong>Address</strong></td>
      <td width="10%" bgcolor="#003300"><strong>Phone</strong></td>
    </tr>
	<?php
	include("connection/db_con.php");
	$query=mysql_query("SELECT * FROM farmer where stat=1") or die(mysql_error());
	while($fetch=mysql_fetch_array($query)){

	?>
    <tr>
      <td><?php echo $fetch['firstname']; ?></td>
      <td><?php echo $fetch['lastname']; ?></td>
      <td><?php echo $fetch['location']; ?></td>
      <td><?php echo $fetch['gender']; ?></td>
      <td><?php echo $fetch['email']; ?></td>
      <td><?php echo $fetch['address']; ?></td>
      <td><?php echo $fetch['mobile']; ?></td>
    </tr>
	<?php } ?>
  </table>
 
</form>

