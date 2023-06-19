<?php
//session_start();
error_reporting(0);
if(!isset($_SESSION['logged'])){
die('<script language=javascript> location=("index.php");</script>');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div id="content">
		 <script language="javascript" type="text/javascript" src="addons/tinymce/jscripts/tiny_mce/tiny_mce_gzip.php"></script>
<script language="javascript" type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple",
        width: "100%",
        height: "300"
	});
</script>
	      
<table width="80%" border="0" align="center" cellspacing="0" bordercolor="#FF0000"><caption style="align:center;bgcolor:#666666;">
 Add a product
</caption><tr><td width="58%" align="center" bgcolor="#80FF80"><form method="POST" action="">
<p>Group/Categories 
  <select name="pcat">
    <option value="crops">Crops</option>
    <option value="Poultry">Poultry</option>
    <option value="Dairy">Dairy</option>
    <option value="Goat Farming">Goat Farming</option>
    <option value="Beef">Beef</option>
    <option value="Pigery">Pigery</option>
    <option value="Chemicals">Chemicals</option>
    <option value="Machinery">Machinery</option>
  </select>
  </p>
<br />Product's Name <input type="text" name="pname"  value="<?php echo $_POST['pname']; ?>"/><br/>
  ID <input type="text" name="pid" size="60" maxlength="60" value="<?php echo $_POST['pid']; ?>"><br />
  <strong>Upload Product Pic</strong><br/><input name="picture"  type="file" size="10" /><br/>
  
  Description <br />
  <textarea name="pdescr" rows="15" cols="50" value="<?php echo $_POST['pdescr']; ?>"></textarea>
  <br />Price (incl. VAT) <input type="text" name="pprice" size="10" maxlength="10" value="<?php echo $_POST['pprice']; ?>"><br />Stock   <input type="text" name="pstock" size="4" maxlength="10" value="<?php echo $_POST['pstock']; ?>"><br /><select name="units">
  <option value="kgs">Kgs</option>
  <option value="tonnes">Tonnes</option>
  <option value="bags">Bags</option>
  <option value="bells">Bells</option>
  <option value="litres">Litres</option>
  <option value="units">Units</option>
  </select><br /><br />
</p>
<div align=center><input type="hidden" name="action" value="save_new_product"><input type="submit" name="Submit" value="Add product"></div></form></td></tr></table>	</div>
	<?php
include("connection/db_con.php");
include("functions.php");
$differencetolocaltime=1;
$tim=date('U')-$differencetolocaltime*3600;
$time=date('H:i:s',$tim);
$dat=date('Y-m-d');
$stat=1;
$dtime=$dat."(".$time.")";
$pname=$_POST['pname'];
$cat=$_POST['pcat'];
$id=$_POST['pid'];
//$pic=$_POST['pic'];
$descr=$_POST['pdescr'];
$price=$_POST['pprice'];
$stock=$_POST['pstock'];
$companyid=$_SESSION['id'];
$units=$_POST['units'];

$filename=$_FILES["picture"]["name"];
		if(move_uploaded_file($_FILES["picture"]["tmp_name"],"products//$filename"))
  $tm=time();
if(isset($_POST['Submit'])){
if(!$cat|!$id|!$descr|!$pname|!$price|!$stock)
{
message("Enter all details please");
}
/*atoz($cat);
atoz($id);
atoz($price);
atoz($stock);
atoz($pname);
if(substr($cat,0,1)=="n"){
message("Special characters are not allowed on text fields. eg * # ' etc");
}
if(substr($pname,0,1)=="n"){
message("Special characters are not allowed on text fields. eg * # ' etc");
}*/
 if(!$filename){
  message("Select the picture");
  }
/*if(!preg_match("^[0-9]{2}\-[0-9]{6,7}\-[A-Za-z]{1}\-[0-9]{2}^", $idnum))
{
message("Please enter valid characters for ID number,in the correct format e.g,63-1234567-H-80.");	
}

  if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $mail)){
message("Invalid e-mail address");
  }
validate_cell($cell);*/
$query=mysql_query("SELECT * FROM products WHERE id='$id'") or die(mysql_error());
$count=mysql_num_rows($query);
if($count==1){
message("Product ID already exists");
}
$qry2=mysql_query("select * from products where pname='$pname'") or die(mysql_error());
check_dublicate($qry2);

$addfile = "INSERT INTO products (category, pname, id, pic, description, price, stock, companyid,units) ".
           "VALUES ('$cat','$pname', '$id', '$filename', '$descr', '$price', '$stock', '$companyid', '$units')";
mysql_query($addfile) or die(mysql_error());
$d=date('Y-m-d');

message_goto("Product added successfull!","farmer.php?page=addproduct.php");
}
?> 
</body>
</html>