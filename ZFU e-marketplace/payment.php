<?php
//session_start();
error_reporting(0);
if(!isset($_SESSION['logged'])){
die('<script language=javascript> location=("index.php");</script>');
}
?>
<?php 
include("functions.php");
include("connection/db_con.php");
$query=mysql_query("SELECT * FROM cart Where customid='$_SESSION[userid]'") or die(mysql_error());
$fetch=mysql_fetch_array($query);
?>

  
<?php 
if (isset($_POST['procid'])) 
		{ 
if($_SESSION["level"]=="company"||$_SESSION["level"]=="farmer"){
$rs1 = mysql_query("select * from companies where paypal_email= '$_POST[payPal_email]'  or masterCard_Id = '$_POST[masterCardId]' ");
   $rw = mysql_num_rows($rs1);
   if($rw == 1){
	   
	   @$date=date('d-m -Y');
  @$costperUnit=$_POST['costperUnit'];
  @$prdct=$_POST['prdct'];
  @$qnty=$_POST['qnty'];
    @$total=$_POST['total'];
$query="INSERT INTO purchases(id,customerid, date, product, quant, priceperunit, total,transport_status)
  VALUES(NULL,'$_SESSION[userid]', '$date', '$prdct', '$qnty','$costperUnit','$total','$_POST[delivery]')";
  $done=mysql_query($query) or die(mysql_error());
  $query1="DELETE FROM cart WHERE customid='$_SESSION[userid]'";
  $done1=mysql_query($query1) or die(mysql_error());
  
  ?>
   <script type="text/javascript" language="javascript">
  alert("Order finalised successfuly");
  </script>
  <?php
  redirectto($_SESSION['url']."?page=vproducts.php");
  
  
  
   ?>
  <script language="javascript">
 alert("Payment done sucessfully");
window.location="admin1.php?page=finalisepurchase.php";
  </script>
  <?php
  exit;
   }
   else{
	 ?>
  <script language="javascript">
 alert("Invalid MasterCard ID or PayPal email");
 javascript:history.go(-1)
  </script>
  <?php
  exit;  
   }
}
   else{
	   
	$rs2 = mysql_query("select * from farmer where paypal_email= '$_POST[payPal_email]'  or masterCard_Id = '$_POST[masterCardId]' ");
   $rw2 = mysql_num_rows($rs2);
   if($rw2 == 1){
	   
	    @$date=date('d-m -Y');
  @$costperUnit=$_POST['costperUnit'];
  @$prdct=$_POST['prdct'];
  @$qnty=$_POST['qnty'];
    @$total=$_POST['total'];
$query="INSERT INTO purchases(id,customerid, date, product, quant, priceperunit, total,transport_status)
  VALUES(NULL,'$_SESSION[userid]', '$date', '$prdct', '$qnty','$costperUnit','$total','$_POST[delivery]')";
  $done=mysql_query($query) or die(mysql_error());
  $query1="DELETE FROM cart WHERE customid='$_SESSION[userid]'";
  $done1=mysql_query($query1) or die(mysql_error());
	   
   ?>
  <script language="javascript">
 alert("Payment done sucessfully");
window.location="farmer.php?page=finalisepurchase.php";
  </script>
  <?php
  exit;
   }
   else{
	 ?>
  <script language="javascript">
 alert("Invalid MasterCard ID or PayPal email");
 javascript:history.go(-1)
  </script>
  <?php
  exit;  
   }   
   }
		}
   ?>
   <form action="" method="post" name="form1">
<table width="80%" cellpadding="2">
  <tr>
    <td>Master Card ID</td>
    <td><input name="masterCardId" type="text" /></td>
  </tr>
  <tr>
    <td>PayPal email</td>
    <td><input name="payPal_email" type="text" /></td>
  </tr>
  <tr>
    <td>Deliver the Product</td>
    <td><label for="select"></label>
      <select name="delivery" id="select">
      <option value="deliver">Yes</option>
      <option value="own Transport">No</option>
      </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="procid" type="submit" value="Proceed"/><input name="cancel" type="submit" value="Cancel"/></td>
  </tr>
  <input name="costperUnit" type="hidden" value="<?php echo $fetch['costperUnit'] ?>" /><input name="prdct" type="hidden" value="<?php echo $fetch['prdct'] ?>" /><input name="qnty" type="hidden" value="<?php echo $fetch['qnty'] ?>" /><input name="total" type="hidden" value="<?php echo $fetch['total'] ?>" />
</table></form>
