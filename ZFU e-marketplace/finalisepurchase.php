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
$query=mysql_query("SELECT * FROM cart Where customid='$_SESSION[userid]'") or die(mysql_error());
$fetch=mysql_fetch_array($query)
 
?>
  <table width="100%" border="0" cellspacing="0"  bordercolor="#FF8C1A">
    <tr>
      <td><table width="70%" cellspacing="5" cellpadding="5" align="center">
          <tr bgcolor="#333333" style="color:#FFF">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><strong>Cart</strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr bgcolor="#CCCCCC">
            <td><strong>Date</strong></td>
            <td><strong>Product</strong></td>
            <td><strong>Quantity</strong></td>
            <td><strong>Price per Unit</strong></td>
            <td><strong>Total Cost</strong></td>
          </tr>
          <tr >
            <td><?php echo $fetch['date']; ?></td>
            <td><?php echo $fetch['prdct']; ?></td>
            <td><?php echo $fetch['qnty']; ?></td>
            <td><?php echo $fetch['costperUnit']; ?></td>
            <td><?php echo $fetch['total']; ?></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <?php
  if(isset($_POST['empty'])){
	  $query1="DELETE FROM cart WHERE customid='$_SESSION[userid]'";
  $done1=mysql_query($query1) or die(mysql_error());
  ?>
   <script type="text/javascript" language="javascript">
  alert("Cart Now Empty");
  </script>
  <?php
  redirectto($_SESSION['url']."?page=vproducts.php");
	   }
  ?>
  <?php if ($_SESSION['level']=="company"){?>
   <a href="company1.php?page=payment.php"> <input type="button" name="Submit" value="Finalise"  style="margin-left:40%" /></a> 
   <?php }
   else if($_SESSION['level']=="farmer"){?>
      <a href="farmer.php?page=payment.php"> <input type="button" name="Submit" value="Finalise"  style="margin-left:40%" /></a> 

   <?php }?>
   
   <input name="empty" type="submit" value="Empty Cart" onclick="if ( !confirm('Are you sure you want to empty this cart?') ) { return false; }" >
  </p>
  <p>&nbsp;</p>
</form>
