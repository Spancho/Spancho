<?php
//session_start();
error_reporting(0);
if(!isset($_SESSION['logged'])){
die('<script language=javascript> location=("index.php");</script>');
}
?>
<script language="javascript" src="jquery-1.9.1.min.js"></script>
<script language="javascript" src="jquery.bvalidator.js"></script> 
<link href="bvalidator.css" rel="stylesheet" type="text/css" /> 
<link href="themes/bvalidator.theme.orange.css" rel="stylesheet" type="text/css" />
<link href="themes/bvalidator.theme.red.css" rel="stylesheet" type="text/css" />
<link href="themes/bvalidator.theme.gray2.css" rel="stylesheet" type="text/css" />
<link  href="themes/bvalidator.theme.postit.css" rel="stylesheet" type="text/css" />
<link href="themes/bvalidator.theme.bootstrap.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript">
        
        var options = {
            singleError: true,
            showCloseIcon: false
        };

        $('#form1').bValidator(options);

    </script>


<script type="text/javascript">            
    
    var optionsPostIt = {
        classNamePrefix:   'bvalidator_postit_',
        offset:               {x:-29, y:-10},
        template:          '<div class="{errMsgClass}">{message}<div class="bvalidator_postit_pointer"><div class="bvalidator_postit_inner_pointer"></div></div></div>'
    };
    
    $(document).ready(function () {
        $('#form1').bValidator(optionsPostIt);
    });
    </script>

<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<form action="" method="post" name="form1" id="form1">
<?php 
include("functions.php");
include("connection/db_con.php");
 
?>
  <table width="100%" border="0" cellspacing="0"  bordercolor="#FF8C1A">
    <tr>
      <td><table width="40%" border="0" align="center">
        <tr>
          <td colspan="2" bgcolor="#999999"><div align="center" class="style1"> <strong>Change Password </strong></div></td>
        </tr>
        <tr bgcolor="#999966">
          <td width="50%" bgcolor="#CCCCCC">Username</td>
          <td width="50%" bgcolor="#CCCCCC"><label>
            <input type="text" name="usr" value="<?php echo $_SESSION['username']; ?>"  readonly="" id="usr" data-bvalidator="required" />
          </label></td>
        </tr>
        <tr bgcolor="#999966">
          <td bgcolor="#CCCCCC">Old Password </td>
          <td bgcolor="#CCCCCC"><input type="password" name="oldp" value="<?php echo $_POST['oldp']; ?>"  id="oldp" data-bvalidator="required" /></td>
        </tr>
        <tr bgcolor="#999966">
          <td bgcolor="#CCCCCC">New Password </td>
          <td bgcolor="#CCCCCC"><input type="password" name="newp" value="<?php echo $_POST['newp']; ?>"  id="newp" data-bvalidator="minlength[5],required" /></td>
        </tr>
        <tr bgcolor="#999966">
          <td bgcolor="#CCCCCC">Confirm Password </td>
          <td bgcolor="#CCCCCC"><input type="password" name="conp" value="<?php echo $conp; ?>" id="conp"  data-bvalidator="equalto[newp],required"/></td>
        </tr>
        <tr bgcolor="#999966">
          <td colspan="2" bgcolor="#CCCCCC"><label>
            <center>
              <input type="submit" name="Submit" value="Update" />
            </center>
          </label></td>
        </tr>
      </table></td>
    </tr>
  </table>
  <?php
  if(isset($_POST['Submit'])){
  @$usr=$_POST['usr'];
  @$newp=$_POST['newp'];
  @$oldp=$_POST['oldp'];
  @$conp=$_POST['conp'];
  if(!$usr|!$oldp|!$newp|!$conp){
  alert("Enter all fields please.");
  }
  $query=mysql_query("select * from admin where username='$usr'") or die(mysql_error());
  $query2=mysql_query("select * from admin where username='$usr' and password='$oldp'") or die(mysql_error());
  $count=mysql_num_rows($query);
  if($count==0){
    alert("User name does not exists.");
  }
  $count2=mysql_num_rows($query2);
  if($count2==0){
    alert("Invalid old password.");
  }
  if($_POST['newp']!=$_POST['conp']){
    alert("Password not matching");
  }
   if($_POST['newp']==$_POST['oldp']){
    alert("Password same as previously used");
  }
  if(strlen($newp)<8){
  alert("Password too weak. Enter at least 8 characters");
  }
  mysql_query("update admin set password='$newp' where username='$usr'") or die(mysql_error());
  green("Password changed successfuly");
  }
  ?>
</form>
