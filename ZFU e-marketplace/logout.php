<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HOME</title>
<title>HOME</title>
<link href="/css/style.css" rel="stylesheet"/>
<link href="/css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="/css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="/css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />

</head>
</head>
<body link="#0066FF" vlink="#6633CC" bgcolor="#FFFFCC" background="images/image4s.jpg" style='margin:0'>
					

                   	<?php /*if ($_SESSION['is']['UserName']):?>
					<li><a href="logout.php">Logout</a></li>
					<?php endif;*/?>
               
			
<div id="content">
    		<div class="content-nav">
			<div class="content-wrap" align="center">	
<?php
session_start();

  
  
		@session_unregister('is');
		@session_unset();

  
 echo '<meta http-equiv="refresh" content="2;url=index.php">';

 echo '<img src="images/LoadingProgressBar.gif">';
 ?>
		</div>						
       	 </div>
    </div>
  
</div>
</html>
</body>