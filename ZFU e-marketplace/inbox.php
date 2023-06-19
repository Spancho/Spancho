
<?php
//session_start();
error_reporting(0);
if(!isset($_SESSION['logged'])){
die('<script language=javascript> location=("index.php");</script>');
}
?><style type="text/css">
<!--
.style1 {
	color: #006600;
	font-weight: bold;
}
-->
#mydiv {
	z-index: 2;
	bottom: 52px;
	width: 750px;
	height:200px;
	overflow:scroll;
	border:thin;
	border-color:#030;
	background-color:#FFFFFF;
}
.style2 {
	color: #FFFFFF;
	font-weight: bold;
}
</style>
<form action="" method="post" enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="0"  bordercolor="#FF8C1A">
    <tr>
      <td><center><div id="mydiv"><table width="100%" border="0" align="center">
        <tr>
          <td colspan="4" bgcolor="#999999"><div align="center" class="style2"> Mails Inbox</div></td>
        </tr>
        <tr>
          <td width="14%" bgcolor="#F0F0F0"><span class="style1">From</span></td>
          <td width="13%" bgcolor="#F0F0F0"><span class="style1">Date Sent </span></td>
          <td width="17%" bgcolor="#F0F0F0"><span class="style1">Subject</span></td>
          <td bgcolor="#F0F0F0"><span class="style1">Message</span></td>
        </tr>
		  <?php
		  include("connection/db_con.php");
		  $query=mysql_query("SELECT email FROM farmer where username='$_SESSION[username]' ORDER BY farmerid") or die(mysql_error());
$fetchz=mysql_fetch_array($query);
		 $sql="select * from mails where toh='$_SESSION[username]'";
		  $sql .= " OR toh='$fetchz[email]'";
$result = mysql_query($sql);
		  while($fetch=mysql_fetch_array($result)){ 
		  ?>
        <tr>
          <td bgcolor="#FFFFFF"><?php echo $fetch['fro']; ?></td>
          <td bgcolor="#FFFFFF"><?php echo $fetch['dat']; ?></td>
          <td bgcolor="#FFFFFF"><?php echo $fetch['sub']; ?></td>
          <td width="53%" bgcolor="#FFFFFF"><?php echo $fetch['msg']; ?></td>
          </tr>
<?php
}
?>
      </table>
      </div></center></td>
    </tr>
  </table>
</form>