<?php
//session_start();
error_reporting(0);
if(!isset($_SESSION['logged'])){
die('<script language=javascript> location=("index.php");</script>');
}
?>
<form name="form1" action="" method="post" >
<style type="text/css">
<!--
.style7 {font-family: Georgia, "Times New Roman", Times, serif; font-size: 10px; }
-->
#messages {
			z-index: 2;
			position: fixed;
			bottom: 80px;
			width: 350px;
			height:125px;
			overflow:scroll;
			border:thin;
			border-color:#0066FF;
			background-color:#E2E4FF;
		}
		#chat_txt {
			z-index: 2;
			position: fixed;
			bottom: 20px;
			width: 350px;
			height:50px;
			text-align:center;
			
			
			
		}
		#mydiv {
			z-index: 2;
			bottom: 52px;
			width: 700px;
			height:200px;
			overflow:scroll;
			border:thin;
			border-color:#FF8C1A;
			background-color:#FFFFFF;
}
a:link {
	color: #006600;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #006600;
}
a:hover {
	text-decoration: underline;
	color: #006600;
}
a:active {
	text-decoration: none;
	color: #006600;
}
</style>
<strong>
<center>
  <h2>ZFU FORUM</h2>
</center>
</strong>
<hr>
<table border="0" cellspacing="0"  bordercolor="#FF8C1A" width="100%"><tr><td width="75%" height="213">
  <div id="mydiv">
  <?php
include("connection/db_con.php");
$query=mysql_query("SELECT * FROM forum2  ORDER BY id") or die(mysql_error());
?>
    
    <?php
	while($fetch=mysql_fetch_array($query)){
	
	?>
  <table width="100%" border="0" bgcolor="#FFFFFF" align="center" cellspacing="0">
    <tr>
      <td width="14%" height="39"><img src="profile/<?php echo $fetch['pic']; ?>" width="67" height="52">                </td>
      <td height="39" colspan="4"><?php echo $fetch['msg']; ?></td>
      </tr>
    <tr bgcolor="#FF8C1A">
      <td width="14%" bgcolor="#CCCCCC" class="style7">Posted By:</td>
      <td width="55%" bgcolor="#CCCCCC" class="style7"><?php echo $fetch['usr']; ?></td>
      <td width="16%" bgcolor="#CCCCCC" class="style7">Date: <?php echo $fetch['dat']; ?></td>
      <td width="15%" bgcolor="#CCCCCC" class="style7">Time: <?php echo $fetch['tym']; ?></td>
      </tr>
    </table>
    <?php
	}
	?>
   
      <label>
        <input name="content" type="text" size="60" style="background-color:#8F8;" />
        </label>
      <label>
        <input type="submit" name="Submit" value="Posts" />
        </label>
      
    </div>
</td>
    </tr>
 
</table>
 <?php
 include("functions.php");
 @$content=$_POST['content'];
 $differencetolocaltime=0;
 $tim=date('U')-$differencetolocaltime*3600;
 $time=date('H:i:s',$tim);
 $dat=date('Y-m-d');
  if(isset($_POST['content'])){
  if(!$content){
  message("Fill post information");
  }
  $query="INSERT INTO forum2(usr, msg, tym, dat, pic)
  VALUES('$_SESSION[usr]', '$content', '$time', '$dat','$_SESSION[pic]')";
  $done=mysql_query($query) or die(mysql_error());
      message("post was successful");
  redirectto($_SESSION['url']."?page=forum2.php");
  }
  ?>
</form>