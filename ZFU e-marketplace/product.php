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
          <td colspan="2" bgcolor="#999999"><div align="center" class="style1"><strong>Product Details</strong></div></td>
        </tr>
        <tr bgcolor="#999966">
          <td width="50%" bgcolor="#CCCCCC"><?php echo $fetch['pname']; ?></td>
          <td width="50%" bgcolor="#CCCCCC">&nbsp;</td>
        </tr>
        <tr bgcolor="#999966">
          <td bgcolor="#CCCCCC"><img src="products/<?php echo $fetch['pic']; ?>" width="167" height="152"></td>
          <td bgcolor="#CCCCCC"><?php echo $fetch['description']; ?></td>
        </tr>
        <tr bgcolor="#999966">
          <td bgcolor="#CCCCCC">Quantity </td>
          <td bgcolor="#CCCCCC"><?php echo $fetch['stock'].$fetch['units']; ?></td>
        </tr>
        <tr bgcolor="#999966">
          <td bgcolor="#CCCCCC">Price</td>
          <td bgcolor="#CCCCCC"><?php echo " US$ ".$fetch['price']."per Unit" ?></td>
        </tr>
        <tr bgcolor="#999966">
          <td colspan="2" bgcolor="#CCCCCC"><label>
            <center>
              <a href="farmer.php?page=cproduct.php && id=<?php echo $fetch['id']; ?>"><input type="button" name="Submit" value="Buy" /></a>
            </center>
          </label></td>
        </tr>
      </table></td>
    </tr>
  </table>
  
</form>
