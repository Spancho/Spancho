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
<title>ZFU</title>
<link rel="stylesheet" href="jquery-ui/development/themes/base/jquery.ui.all.css">	
	<script src="jquery-ui/development/jquery-1.5.1.js"></script>
	<script src="jquery-ui/development/ui/jquery.ui.core.js"></script>
	<script src="jquery-ui/development/ui/jquery.ui.widget.js"></script>
	<script src="jquery-ui/development/ui/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="jquery-ui/development/demos/demos.css">	
<link href="css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
<link href="abc css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	$(document).ready(function(){
		$("#status").change(function(){
			$.ajax({
				url: 'contract_results.php',
				type: 'post',
				data: $("form").serialize(),
				success: function(res){
					$("#results").html(res)
				}
			});
		});
	});
</script>
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

</head>

<body link="#0066FF" vlink="#6633CC" bgcolor="#FFFFCC" background="images/image001.jpg" style='margin:0'>
<div class="wrapper">
<div class="abc"></div>
<div class="company"><div class="log">Welcome &nbsp;<a href="logout.php" class="logout">Logout</a></div></div>
<div class="time">
<table border="0">
<tr><td>
<div class="tymbar">
<script type="text/javascript"> document.write(''+Date()+'') </script></div>
</td></tr>
</table>
</div>
<div class="link">
<?php 
  include('header.php')
  ?>
  

</div>
<div class="profilehome"></div>
<div class="content-wrap2" align="center"><br/>
        			<h1><font color="#337033" size="5" face="Arial">Products Reports</font></h1><br/>
				<form action="<?php $PHP_SELF ?>" method="post">
                   <div class="content"> </div> <table>
					<tr>
						<td><label>Category:</label></td>
						<td><select class="validate[required] text-input" id="req" name="contract" style="width:300px" />
						<option value="">-- SELECT OPTION --</option>
						<?php
include("connection/db_con.php");
							$id=mysql_query("SELECT max(id)as max_id from products");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECT category FROM products where id = 	'$max_id'");

							$result = mysql_query("SELECT * FROM farmersunion.products ORDER BY id");

						do{
						?>
						<option value="<?php echo $row['category'];?>"><?php echo $row['category'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
                        </select></td>
					</tr>
					<tr>
						<td><label>Status:</label></td>
						<td><select id="status" name="status" style="width:300px" />
						<option value="">-- SELECT OPTION --</option>
						<option value="nzungu" >nzungu</option>
						<option value="#">Rejected</option>
						<option value="#">Pending</option>
						</select>
						</td>
					</tr>
					<tr>
						</tr>
					
					<tr>
						<td></td>
					</tr>
					</table>
					<span id="results"></span>
				</form>				
			</div>						
       	 
    
   


<br /> 
<br />
			
     

<div class="footer"></div>
</body>
</html>

</body>
</html>