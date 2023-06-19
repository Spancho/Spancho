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
$query=mysql_query("SELECT * FROM products Where id=$_GET[id]") or die(mysql_error());
$fetch=mysql_fetch_array($query)
 
?>
  <table width="100%" border="0" cellspacing="0"  bordercolor="#FF8C1A">
    <tr>
      <td><table width="50%" border="0" align="center">
        <tr>
          <td colspan="2" bgcolor="#999999"><div align="center" class="style1"><strong>Cart</strong></div></td>
        </tr>
        <tr bgcolor="#999966">
          <td width="50%" bgcolor="#CCCCCC"><?php echo $fetch['pname']; ?></td><td>&nbsp;</td>
          </tr><tr>
          
          <td bgcolor="#CCCCCC"><img src="products/<?php echo $fetch['pic']; ?>" width="167" height="152"></td>
          <td bgcolor="#CCCCCC"><?php echo $fetch['description']; ?></td>
        </tr>
        <tr bgcolor="#999966">
          <td bgcolor="#CCCCCC">Enter Quantity </td>
          <td bgcolor="#CCCCCC"><input name="qnty" type="text" /></td>
        </tr>
        <tr bgcolor="#999966">
          <td colspan="2" bgcolor="#CCCCCC"><label>
            <center>
              <input type="submit" name="Submit" value="Add to Cart" />
              </center>
            </label></td>
        </tr>
      </table></td>
    </tr>
  </table>
  <?php
  if(isset($_POST['Submit'])){
  @$usr=$_SESSION['id'];
  @$qnty=$_POST['qnty'];
  @$prdct=$fetch['pname'];
  @$pricepU=$fetch['price'];
  $total=$pricepU * $qnty;
  $dat=date("d-m-Y");
  $stck=$fetch['stock']-$_POST['qnty'];
  
  if($fetch['stock']-$_POST['qnty']<0){
   ?>
  <script language="javascript">
 alert("Insufficient Stock");
 javascript:history.go(-1)
  </script>
  <?php
  exit;
   }
  if($fetch['stock']<=0){
   ?>
  <script language="javascript">
 alert("Insufficient Stock");
 javascript:history.go(-1)
  </script>
  <?php
  exit;
   }
  $query="INSERT INTO cart(id,date,customid,prdct, qnty, costperUnit, total)
  VALUES(NULL,'$dat','$_SESSION[userid]','$prdct','$qnty','$pricepU','$total')";
  $done=mysql_query($query) or die(mysql_error());
   mysql_query("update products set stock='$stck' where id='$fetch[id]'") or die(mysql_error());
   ?>
   <script type="text/javascript" language="javascript">
  alert("Order added to cart successfuly");
  </script>
  <?php
  redirectto($_SESSION['url']."?page=finalisepurchase.php");
  
  
  }
  ?>
</form>
