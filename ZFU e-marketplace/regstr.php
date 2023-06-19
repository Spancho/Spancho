<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ZFU</title>
<link href="login.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.wrapper .head2 .link1 a p u b strong {
	color: #00F;
}
.wrapper .head2 .link2 .link1 a p b u {
	color: #000;
}
.wrapper .head2 .link1 a p u b {
	color: #00F;
}
.wrapper .head2 .link2 a p u b {
	color: #00F;
}
.wrapper .head2 .link2 .link1 a p b u {
	color: #00F;
}
</style>
</head>

<body link="#0066FF" vlink="#6633CC" bgcolor="#FFFFCC" background="images/image001.jpg" style='margin:0'>





<div class="wrapper">

<div class="header"></div>
<div class="head2">
<div class="link1">
<a href="index_x.php"><p><u><b>Login</b></u></p></a></div>
<div class="link2">
<div class="link1">
<a href="cregister.php">
<p><u><b>Register Company</b></u></p></a></div>
<a href="register.php"><p><u><b> Register Farmer</b></u></p></a></div>

</div>











<?php 
include("connection/db_con.php");
		$error = "";

		if (isset($_POST['Login'])) 
		{ 			
			$username = trim($_POST['username']);			
			$password = trim($_POST['password']);	
				
			// sending query		
			$result = mysql_query("SELECT * FROM admin WHERE username = '$username' AND password = 
						   '$password'");
						   
			if (!$result) 
			{
				die("Query to show fields from table failed");
			}
									
			$numberOfRows = mysql_num_rows($result);				
			$row = mysql_fetch_array($result);					
				
				if ($numberOfRows == 0) 
				{
					echo " <br><center><font color= 'red' size='3'>Invalid Username and Password !</center></font>";
				} 
				else if ($numberOfRows > 0) 
				{
					session_start();
					session_register('is');
					$_SESSION['is']['login']    = TRUE;
					$_SESSION['is']['username'] = $_POST['username'];
					$_SESSION['userid']=$row['adminid'];
										$_SESSION['id']=$row['adminid'];

					$_SESSION['logged']="true";
					$session = "1";	
							
				header("location:admin1.php");
								 	
				}
		}
	?>
<div class="body">
<br/><br/>
<form method="POST" action="">

<table border="0" align="center" cellspacing="0" style="border:solid 1px;" >
<tr>
<td colspan="4">
<DIV class="admin"><u><b>ADMINISTRATOR</b></u></DIV>
</td>
</tr>
<tr >
<td rowspan="4">
<img src="images/login_icon1.GIF" height="150">
</td>
<td width="">

</td>
<td width="50">

</td><td height="30">

</td>
</tr>
<tr>
<td>

</td><td>
Username
</td><td>
<input type="text" name="username" size="20" />
</td>
</tr>
<tr>
<td>
</td><td>Password
</td><td><input type="password" name="password" size="20">
</td>
</tr>
<tr>
<td>
</td>
<td>
</td><td><input type="submit" value="Login" name="Login" >
</td>

</tr>
</table></label>
</span>
</form>
</div>
<div class="footer"></div>
</div>
</body>
</html>
