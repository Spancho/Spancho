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
     <script src="bkvalidate.js" type="text/javascript" charset="utf-8">
	</script>
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
	
	
<title>ZFU</title>
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
	                $firstname=$_POST['firstname'] ;
					$lastname= $_POST['lastname'] ;				
					$idno=$_POST['id_first_digit']."-".$_POST['id_second_digit']."-".$_POST['id_third_letters']."-".$_POST['id_forth_digit'];
				
					$county=$_POST['county'] ;
					$location=$_POST['location'] ;
					$mobile=$_POST['mobile'] ;
					$address=$_POST['address'] ;
					$email=$_POST['email'] ;
					$gender=$_POST['gender'] ;
$_POST['birthday_month'] = ($_POST['birthday_month']);
	$_POST['birthday_day'] = ($_POST['birthday_day']);
	$_POST['birthday_year'] = ($_POST['birthday_year']);
					$_POST['bdate'] = ($_POST['birthday_year'] . "-" . $_POST['birthday_month']. "-" . $_POST['birthday_day'] );
						$bdate=$_POST['bdate'] ;
					$occupation=$_POST['occupation'] ;			
					$username=$_POST['username'] ;
					$password=$_POST['password'] ;
					$paypal_email=$_POST['TPL_pp_email'] ;
					$masterCard_id=$_POST['masterCardId'] ;							
					$stat="1";							
$rs1 = mysql_query("select * from farmer where username = '$_POST[username]'");
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
   $rs11 = mysql_query("select * from farmer where idno = '$idno'");
   $rw1 = mysql_num_rows($rs11);
   if($rw1 == 1){
   ?>
  <script language="javascript">
 alert("Farmer already exist");
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
   if($_POST['firstname'] == ""){
   ?>
  <script language="javascript">
 alert("firstname empty");
 javascript:history.go(-1)
  </script>
  <?php
  exit;
   }
   if($_POST['lastname'] == ""){
   ?>
  <script language="javascript">
 alert("Lastname empty");
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
   if($_POST['bdate'] == ""){
   ?>
  <script language="javascript">
 alert("Birthday empty");
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
												
		 $insert = mysql_query("INSERT INTO farmer
		 (firstname,lastname,idno,province,location,mobile,address,email,gender,bdate,occupation,username,password,paypal_email,masterCard_Id,stat) 
	VALUES ('$firstname','$lastname','$idno','$county','$location','$mobile','$address','$email','$gender','$bdate','$occupation','$username','$password','$paypal_email','$masterCard_id','$stat')"); 
									
	if($insert) {			 
		header("Location: thanks.php");
	} else {
		echo "<br><center><font color= 'red' size='3'>Could not register. Farmer already exists</center></font>";
	}															
   }
	}
											
				
				
							
	       
?>

<div class="profile2"></div>
<div class="body">


<form name="alokm" method="post" action="" id="form1" enctype="multipart/form-data"><div class="addform"></div>
<div class="head1">
<div class="new" align="center" style="font-size:16px;">
New Farmer Register</div>
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
    <td width="174">First Name:</td>
    <td width="238" align="center"><input type="text" value="" class="validate[required] text-input" id="req"  name="firstname" class="style1" value="" tabindex="1" onFocus="if (this.value == '0') {this.value = '';}" onBlur="if (this.value == '0')" {this.value = '0';} onKeyPress="if (!isNS4) event.returnValue = alphabetic(event.keyCode,0,0); else return alphabetic(event.which,0,0);" required ></td>
   </tr>
	<tr>
    <td width="174">Last Name: </td>
    <td width="238" align="center"><input type="text" value="" class="validate[required] text-input" id="req" name="lastname" class="style1" value="" tabindex="1" onFocus="if (this.value == '0') {this.value = '';}" onBlur="if (this.value == '0')" {this.value = '0';} onKeyPress="if (!isNS4) event.returnValue = alphabetic(event.keyCode,0,0); else return alphabetic(event.which,0,0);" required ></td>
    </tr>
  <tr>
    <td width="174">ID No : </td>
    <td width="238" align="center"><input name="id_first_digit" type="text" id="id_first_digit" size="2" maxlength="2"  />-<input name=" id_second_digit" type="text" maxlength="8" id="id_second_digit" size="9" />-<select name="id_third_letters"><option>A</option><option>B</option><option>C</option><option>D</option><option>E</option><option>F</option><option>G</option><option>H</option><option>I</option><option>J</option><option>K</option><option>L</option><option>M</option><option>N</option><option>O</option><option>P</option><option>Q</option><option>R</option><option>S</option><option>T</option><option>U</option><option>V</option><option>W</option><option>X</option><option>Y</option><option>X</option></select>
            -<input name="id_forth_digit" type="text" id="id_forth_digit" size="2" maxlength="2"  /></td>
    </tr>
  <tr>
    <td width="174">Province :</td>
    <td>
						<select name="county">
							<option style="width: 120px;">Harare</option>
							<option style="width: 120px;">Mash East</option>
							<option style="width: 120px;">Mash West</option>
							<option style="width: 120px;">Manicaland</option>
							<option style="width: 120px;">Bulawayo</option>
							<option style="width: 120px;">Mash Central</option>
							<option style="width: 120px;">Masvingo</option>
							<option style="width: 120px;">Matebeleland North</option>
							<option style="width: 120px;">Matebeleland South</option>
							<option style="width: 120px;">Midlands</option>							
						</select>		
		</td>
	  </tr>
  <tr>
    <td width="174">Location: </td>
    <td width="238" align="center"><input type="text"value=""  class="validate[required] text-input" id="req" name="location" class="style" onKeyPress="if (!isNS4) event.returnValue = alphabetic(event.keyCode,0,0); else return alphabetic(event.which,0,0);" required /></td>
    </tr>
  <tr>
    <td width="174"> Tel/mobile:</td>
    <td width="238" align="center"><input value="" class="validate[required,custom[phone]] text-input" type="text" name="mobile" id="telephone6" /></td>
      </tr>
  
  <tr>
    <td>Address:</td>
    <td align="center"><input type="text" class="style1" name="address" id="lname" value="" tabindex="2" required /></td>
  </tr>
   <tr>
    <td>Email:</td>
    <td align="center">
    <input type="text" style="width: 250px; font-weight: bold; color: #222;
text-transform: none;" onblur="verifyEmail()" name="email" />
	  </tr>
  <tr>
    <td style="width: 95px;">Gender</td>
					<td>
						<select style="width: 148px;" name="gender">
							
							<option>Female</option>
							<option>Male</option>
						</select>					
					</td>
	  </tr>
  <tr>
    <td>Birthday:</td>
	<center>
    <td align="center">
		<input name="birthdate" type="hidden" size="25" />
						 <div id="bmonth"><select class="" style="
font-weight: normal;
color: #222;" name="birthday_month" ></div>
                         <span id="valmonth" style="display:none;">
                        <option value="-1">Month:</option>
                        <option value="January">Jan</option>
                        <option value="February">Feb</option>
                        <option value="March">Mar</option>
                        <option value="April">Apr</option>
                        <option value="May">May</option>
                        <option value="June">Jun</option>
                        <option value="July">Jul</option>
                        <option value="August">Aug</option>
                        <option value="September">Sep</option>
                        <option value="October">Oct</option>
                        <option value="November">Nov</option>
                        <option value="December">Dec</option>
                      </select></span>
                      <span id="bday">
                         <select name="birthday_day" style="font-weight: normal;
color: #222;" autocomplete="on"></span> <span id="valday" style="display:none;">
                           <option value="-1">Day:</option>
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                           <option value="6">6</option>
                           <option value="7">7</option>
                           <option value="8">8</option>
                           <option value="9">9</option>
                           <option value="10">10</option>
                           <option value="11">11</option>
                           <option value="12">12</option>
                           <option value="13">13</option>
                           <option value="14">14</option>
                           <option value="15">15</option>
                           <option value="16">16</option>
                           <option value="17">17</option>
                           <option value="18">18</option>
                           <option value="19">19</option>
                           <option value="20">20</option>
                           <option value="21">21</option>
                           <option value="22">22</option>
                           <option value="23">23</option>
                           <option value="24">24</option>
                           <option value="25">25</option>
                           <option value="26">26</option>
                           <option value="27">27</option>
                           <option value="28">28</option>
                           <option value="29">29</option>
                           <option value="30">30</option>
                           <option value="31">31</option>
                         </select></span>
                        <span id="byear"> <select name="birthday_year" style="font-weight: normal;
color: #222;" autocomplete="on"></span><span id="valyear" style="display:none">
                           <option value="-1">Year:</option>
                           <option value="1997">1997</option>
                           <option value="1996">1996</option>
                           <option value="1995">1995</option>
                           <option value="1994">1994</option>
                           <option value="1993">1993</option>
                           <option value="1992">1992</option>
                           <option value="1991">1991</option>
                           <option value="1990">1990</option>
                           <option value="1989">1989</option>
                           <option value="1988">1988</option>
                           <option value="1987">1987</option>
                           <option value="1986">1986</option>
                           <option value="1985">1985</option>
                           <option value="1984">1984</option>
                           <option value="1983">1983</option>
                           <option value="1982">1982</option>
                           <option value="1981">1981</option>
                           <option value="1980">1980</option>
                           <option value="1979">1979</option>
                           <option value="1978">1978</option>
                           <option value="1977">1977</option>
                           <option value="1976">1976</option>
                           <option value="1975">1975</option>
                           <option value="1974">1974</option>
                           <option value="1973">1973</option>
                           <option value="1972">1972</option>
                           <option value="1971">1971</option>
                           <option value="1970">1970</option>
                         </select></span>
		</td>  
    	</center>
  </tr>
  <tr>
    <td>Occupation:</td>
    <td align="center"><input value="" class="validate[required] text-input" id="req" type="text" class="style1" name="occupation" id="lname" value="" tabindex="2" onKeyPress="if (!isNS4) event.returnValue = alphabetic(event.keyCode,0,0); else return alphabetic(event.which,0,0);" required />
	</td>
  </tr>
  <tr>
    <td>Username</td>
    <td align="center"><input value="" class="validate[required] text-input" id="req"type="text" class="style1" name="username" value=""tabindex="11" onKeyPress="if (!isNS4) event.returnValue = alphabetic(event.keyCode,0,0); else return alphabetic(event.which,0,0);" required /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td align="center"><input value="" class="validate[required] text-input" type="password" name="password" id="password" required /></td>
  </tr>
  <tr>
    <td>Confirm Password</td>
    <td align="center"><input value="" class="validate[required,equals[password]] text-input" type="password" name="password2" id="password2" required /></td>
  </tr>

<tr>
   <td colspan="2" align="center">
   
	<input type="submit" name="submit" id="save" value="submit" tabindex="19"/>
	<input type="reset" value="Reset">
	
	</td>
  </tr>
  </table>
  <h2>Payment Details</h2>
  <table width="100%" border="0" cellpadding="4" align="center">
    <tr>
		<td align="right" width="30%">PayPal Email Address</td>
		<td>
			<input type="text" name="TPL_pp_email" size=40  />
		</td>
	</tr>
	<tr>
		<td align="right" width="30%">MasterCard ID</td>
		<td><input type="text" onKeyPress="if (!isNS4) event.returnValue = numeric(event.keyCode,0,0); else return numeric(event.which,0,0);" name="masterCardId" size=40 required /></td>
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