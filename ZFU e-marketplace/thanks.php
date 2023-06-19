<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<script type="text/javascript">
$(document).ready(function(){

	$(".menu a").hover(function() {
		$(this).next("em").animate({opacity: "show", top: "-75"}, "slow");
	}, function() {
		$(this).next("em").animate({opacity: "hide", top: "-85"}, "fast");
	});


});
</script>

<style type="text/css">

.menu {
	margin: 0px 0 0;
	padding: 0;
	list-style: none;
}
.menu  {
	padding: 0;
	margin: 0 0px;
	float: left;
	position: relative;
	text-align: center;
}
.menu a {
	padding: 0px 0px;
	
	color: #000000;
	width: 0px;
	text-decoration: none;
	font-weight: bold;
	
}
.menu em {
	background: url(student/images/hover.png) no-repeat;
	width: 180px;
	height: 45px;
	position: absolute;
	color: #000000;
	top: -85px;
	left: -15px;
	text-align: center;
	padding: 20px 12px 10px;
	font-style: normal;
	z-index: 2;
	display: none;
}
</style>
<link rel="shortcut icon" href="images/chmsc.png">
<link rel="icon" href="images/chmsc.png" type="image/png" >
<style type="text/css">
<!--
.style2 {color: #00FF00}
.style7 {
	color: #0000FF;
	font-size: small;
}
.style10 {
	color: #0000FF;
	font-size: larger;
}
-->
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="stylelog.css" rel="stylesheet" type="text/css" />
</head>

<body>

	

<div id="layer04_holder">
  
  <div id="center" style="padding-top: 8px;">
  
  <div class="menu">
	   You are successfully Registered, You can now Login in your account
	   BY Clicking Here to Log-in <br /><a href="index.php"><span class=" style2">Login Menu</span></a>
	   
        <br/>
     
   
    </div>
  </div>
 
</div>



</body>
</html>


			
							