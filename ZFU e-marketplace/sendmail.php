<?php
//session_start();
error_reporting(0);
if(!isset($_SESSION['logged'])){
die('<script language=javascript> location=("index.php");</script>');
}
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<form action="" method="post">
<?php
include("functions.php");
include("connection/db_con.php");
@$to=$_POST['to'];
@$fro=$_POST['fro'];
@$sub=$_POST['sub'];
@$msg=$_POST['msg'];
@$dat=date('Y-m-d');
?>
  <table width="100%" border="0"  bordercolor="#FF8C1A" cellspacing="0">
    <tr>
      <td><table width="34%" border="0" align="center">
        <tr>
          <td colspan="2" bgcolor="#004000"><div align="center" class="style1">Compose Mail </div></td>
        </tr>
        <tr>
          <td width="36%" bgcolor="#CCCCCC">To </td>
          <td width="64%" bgcolor="#CCCCCC"><label>
            <input type="text" name="to" value="<?php echo $to; ?>" />
          </label></td>
        </tr>
        <tr>
          <td bgcolor="#CCCCCC">Subject</td>
          <td bgcolor="#CCCCCC"><input type="text" name="sub" value="<?php echo $sub; ?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#CCCCCC">Message</td>
          <td bgcolor="#CCCCCC"><label>
            <textarea name="msg" cols="17" rows="3" ><?php echo $msg; ?></textarea>
          </label></td>
        </tr>
        <tr>
          <td bgcolor="#CCCCCC">From</td>
          <td bgcolor="#CCCCCC"><input type="text" name="fro" value="<?php echo $_SESSION['username']; ?>"  readonly=""/></td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#CCCCCC"><label>
            <center>
              <input type="submit" name="Submit" value="Submit" />
            </center>
          </label></td>
        </tr>
      </table></td>
    </tr>
  </table>
  <?php
  if(isset($_POST['Submit'])){
  if(!$to){
  alert("Recepient field is empty.");
  }
  if(!$sub){
  alert("Subject field is empty.");
  }
  if(!$msg){
  alert("Message field is empty.");
  }
  $query=mysql_query("select * from  farmer,companies where farmer.username='$to' or farmer.email='$to' or companies.username='$to' or companies.email='$to'") or die(mysql_error());

  $count=mysql_num_rows($query);
  if($count==0){
  alert("Recipient not found.");
  }
  if($to==$fro){
    alert("You cannot send a mail to yourself");
  }
$done=mysql_query("insert into mails(toh,fro,sub,msg,dat)
  values('$to','$fro','$sub','$msg','$dat')") or die(mysql_error());
  green("Message sent successfully.");
  }
  ?>
</form>
