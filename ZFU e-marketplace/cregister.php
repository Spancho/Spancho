<?php ob_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<script>
function verifyEmail(){
    
var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
     if (document.alokm.email.value.search(emailRegEx) == -1) {
          alert("Please enter a valid email address.");
     }
    
     
    
     return false;
}

</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />		
	<link rel="stylesheet" href="jquery-ui/development/themes/base/jquery.ui.all.css">	
	<script src="jquery-ui/development/jquery-1.5.1.js"></script>
	<script src="jquery-ui/development/ui/jquery.ui.core.js"></script>
	<script src="jquery-ui/development/ui/jquery.ui.widget.js"></script>
	<script src="jquery-ui/development/ui/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="jquery-ui/development/demos/demos.css">	
<?php
//start validation code
?>

<script>
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	function getContract(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('boxdiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>
 
 <link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
	<link rel="stylesheet" href="css/template.css" type="text/css"/>
<script type="text/javascript" language="JavaScript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
<script src="js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
	</script>
	<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
	</script>
    <script src="bkvalidate.js" type="text/javascript" charset="utf-8">
	</script>
	<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#formID").validationEngine('attach');
		});
	</script>
<script>
$(function() {
$( "#selectable" ).selectable();
});

</script>
<script>
		jQuery(document).ready( function() {
			// binds form submission and fields to the validation engine
			jQuery("#formID").validationEngine('attach');
		});
	</script>
    <script>
function validateEntries() 
{
	var reg = /[a-zA-Z]{1}[a-zA-Z0-9]{5,19}$/
	var str = document.getElementById("username").value;
	if (!(str.match(reg)))
	{
		document.getElementById("message").innerHTML = "Not a valid username. Please enter alpha numeric minimum of 6 characters and maximum of 20 characters and should start with alphabet.";
		return false;	
	}
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
		var str = document.getElementById("email").value;
	if(!(str.match(mailformat)))  
	{  
	document.getElementById("message").innerHTML = "You have entered an invalid email address.";
		return false;	
			}  	
	
	var reg = /^[A-Za-z]\w{6,}$/;
	var str = document.getElementById("pass").value;		
	if (!(str.match(reg)))
	{
		document.getElementById("message").innerHTML = "Please enter a valid password! password must be at least 8 characters long and start and end with a letter.";
		return false;	
	}	
	
	var pass = document.getElementById('pass').value;
	var pass2 = document.getElementById('pass2').value;
	
	if (pass != pass2){
		document.getElementById("message").innerHTML = "Please enter the confirmed password correctly.";
		return false;	
	}
	
}
</script>
	
<?php
//end validation
?>	
	

	<script>
	$(function() {
		$( "#datepicker" ).datepicker({
			changeMonth: true,
			dateFormat: 'yy-mm-dd',
			changeYear: true,
			showButtonPanel: true,
			minDate:2
		});
		$( "#date" ).datepicker({		 
			changeMonth: true,
			dateFormat: 'yy-mm-dd',
			changeYear: true,
			showButtonPanel: true,
			maxDate:-6570
		});
	});	
	</script>
	
	
<title>Register Company</title>
<link href="abc css.css" rel="stylesheet" type="text/css" />
</head>

<body link="#0066FF" vlink="#6633CC" bgcolor="#FFFFCC" background="images/image001.jpg" style='margin:0'>
<div class="wrapper">
<div class="abc"></div>
<div class="company"><div class="log" align="center" style="font-size:16px;">Welcome &nbsp;<a href="index.php" class="logout">LOGIN</a></div></div>
<div class="time" align="center" style="font-size:16px;">
<table border="0" class="tymbar">
<tr><td>
<div class="jva">
<script type="text/javascript"> document.write(''+Date()+'') </script></div>
</td></tr>
</table>
</div>
<?php

if (isset($_POST['submit']))
	{	   
include("connection/db_con.php");
	                $name=$_POST['name'] ;
					$location=$_POST['location'] ;
					$mobile=$_POST['mobile'] ;
					$address=$_POST['address'] ;
					$email=$_POST['email'] ;
					$type=$_POST['type'] ;
					$username=$_POST['username'] ;
					$password=$_POST['password'] ;
					$paypal_email=$_POST['TPL_pp_email'] ;
					$masterCard_id=$_POST['masterCardId'] ;	
					$stat="1";							
						
$rs1 = mysql_query("select * from companies where username = '$_POST[username]'");
   $rw = mysql_num_rows($rs1);
   if($rw == 1){
   ?>
  <script language="javascript">
 alert("Username In Use");
 javascript:history.go(-1)
  </script>
  <?php
  exit;
   }
   $rs11 = mysql_query("select * from companies where name = '$name'");
   $rw1 = mysql_num_rows($rs11);
   if($rw1 == 1){
   ?>
  <script language="javascript">
 alert("Company already exist");
 javascript:history.go(-1)
  </script>
  <?php
  exit;
   }
    
   
   if($_POST['password']!=$_POST['password2']){
   ?>
  <script language="javascript">
 alert("Password did not match with confrim password");
 javascript:history.go(-1)
  </script>
  <?php
  exit;
   }
   if(strlen($_POST['password']) < 8 ){
   ?>
  <script language="javascript">
 alert("Password should be above 8 charactors");
 javascript:history.go(-1)
  </script>
  <?php
  exit;
   }
   if($_POST['email'] == ""){
   ?>
  <script language="javascript">
 alert("Email empty");
 javascript:history.go(-1)
  </script>
  <?php
  exit;
   }
   if($_POST['mobile'] == ""){
   ?>
  <script language="javascript">
 alert("Mobile empty");
 javascript:history.go(-1)
  </script>
  <?php
  exit;
   }
   if($_POST['username'] == ""){
   ?>
  <script language="javascript">
 alert("Username empty");
 javascript:history.go(-1)
  </script>
  <?php
  exit;
   }
  
   if($_POST['address'] == ""){
   ?>
  <script language="javascript">
 alert("Address empty");
 javascript:history.go(-1)
  </script>
  <?php
  exit;
   }
   else{												
												
		 $insert = mysql_query("INSERT INTO companies
		 (id,name,location,phone,address,email,type,username,password,paypal_email,masterCard_Id) 
	VALUES (NULL,'$name','$location','$mobile','$address','$email','$type','$username','$password','$paypal_email','$masterCard_id')"); 
									
	if($insert) {			 
		header("Location: thanks.php");
	} else {
		echo "<br><center><font color= 'red' size='3'>Could not register. Company already exists</center></font>";
	}															
			
	}
	}
?>

<div class="profile2"></div>
<div class="body">


<form name="alokm" method="post" action="" id="form1" enctype="multipart/form-data"><div class="addform"></div>
<div class="head1">
<div class="new" align="center" style="font-size:16px;">
Register new Company</div>
</div>
<div class="body1">
 <style type="text/css">
.a{
	width:400px;
    margin-left:500px;
	background-color:#004000;
	font-size:16px;
    
	input[class=id_empno], input.id_empno{
		background:#CCC;}
	}
</style>	  
 <fieldset class="a" > <legend>Register</legend>
<table border="0" width="auto" cellspacing="0" bordercolorlight="#00FF66" class="addrec" align="center"> 
  <tr>
    <td width="174">Company Name:</td>
    <td width="238" align="center"><input type="text" value="" class="validate[required] text-input" id="req"  name="name" class="style1" value="" tabindex="1" onFocus="if (this.value == '0') {this.value = '';}" onBlur="if (this.value == '0')" {this.value = '0';} onKeyPress="if (!isNS4) event.returnValue = alphabetic(event.keyCode,0,0); else return alphabetic(event.which,0,0);" required ></td>
   </tr>
  <tr>
    <td width="174">Location: </td>
    <td width="238" align="center"><input type="text"value=""  class="validate[required] text-input" id="req" name="location" class="style" onKeyPress="if (!isNS4) event.returnValue = alphabetic(event.keyCode,0,0); else return alphabetic(event.which,0,0);" required /></td>
    </tr>
  <tr>
    <td width="174"> Tel/mobile:</td>
    <td width="238" align="center"><input value="" class="validate[required,custom[phone]] text-input" type="text" name="mobile" id="telephone6" onKeyPress="if (!isNS4) event.returnValue = numeric(event.keyCode,0,0); else return numeric(event.which,0,0);" required /></td>
	    </tr>
  
  <tr>
    <td>Address:</td>
    <td align="center"><input type="text" class="style1" name="address" id="lname" value="" tabindex="2"/></td>
  </tr>
   <tr>
    <td>Email:</td>
    <td align="center">
    <input type="text" style="width: 250px; font-weight: bold; color: #222;
text-transform: none;" onblur="verifyEmail()" name="email" />
	  </tr>
  <tr>
    <td style="width: 95px;">Type</td>
	<td>
						<select style="width: 148px;" name="type">
							
							<option value="Buyer">Buyer</option>
							<option value="Seller">Seller</option>
						</select>					
					</td>
					</tr>
 <tr>
    <td>Username</td>
    <td align="center"><input value="" class="validate[required] text-input" id="req"type="text" class="style1" name="username" value=""tabindex="11" onKeyPress="if (!isNS4) event.returnValue = alphabetic(event.keyCode,0,0); else return alphabetic(event.which,0,0);" required /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td align="center"><input value="" class="validate[required] text-input" type="password" name="password" id="password" /></td>
  </tr>
  <tr>
    <td>Confirm Password</td>
    <td align="center"><input value="" class="validate[required,equals[password]] text-input" type="password" name="password2" id="password2" /></td>
  </tr>
<tr>
   <td colspan="2" align="center">
   
	<input type="submit" name="submit" id="save" value="submit" tabindex="19" />
	<input type="reset" value="Reset">
	
	</td>
  </tr>
</table>
<h2>Payment Details</h2>
  <table width="100%" border="0" cellpadding="4" align="center">
    <tr>
		<td align="right" width="30%">PayPal Email Address</td>
		<td>
			<input type="text" name="TPL_pp_email" size=40 >
		</td>
	</tr>
	<tr>
		<td align="right" width="30%">MasterCard ID</td>
		<td><input type="text" onKeyPress="if (!isNS4) event.returnValue = numeric(event.keyCode,0,0); else return numeric(event.which,0,0);" name="masterCardId" size=40 required ></td>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
</table>
<input type="hidden" name="insert" value="" />
</form>
	

</div>
<div class="foot1"></div>

</div>
<div class="footer"></div>
</div>
	<script type="text/javascript"> Cufon.now(); </script>

</body>
</html>
<?php ob_flush(); ?>