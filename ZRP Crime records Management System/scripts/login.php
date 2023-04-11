<?php
	@session_start();
	include_once(dirname(__FILE__)."/includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	
	if(isset($_POST['login'])){
		$rs = $dbManager->getCustomQuery("select * from user where username like '".$_POST['username']."' and password = '".$_POST['password']."'");
		
		if(count($rs) == 0){
			$err = "Invalid login details";
		}else{
			$_SESSION['user_id'] = $rs[0]['id'];
			$_SESSION['username'] = $rs[0]['username'];
			$_SESSION['level'] = $rs[0]['level'];
			$_SESSION['logged_in'] = true;
			$dbManager->redirect("index.php");
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<script language="javascript" src="js/jquery.js"></script>
	<script language="javascript" src="js/bootstrap.js"></script>
	<script language="javascript" src="js/bootstrap.min.js"></script>
	<script language="javascript" src="js/jquery.ui.datepicker.js"></script>
	<script language="javascript" src="js/jquery-ui.min.js"></script>
    <meta charset="utf-8">
    <title>ZRP</title>
    <meta name="description" content="">
    <meta name="author" content="Gracious Mashasha">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
	<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="all" />
    <link href="bootstrap.css" rel="stylesheet">
    <style type="text/css">
      /* Override some defaults */
      html, body {
        background-color: #eee;
      }
      body {
        padding-top: 40px; /* 40px to make the container go all the way to the bottom of the topbar */
      }
      .container > footer p {
        text-align: center; /* center align it with the container */
      }
      .container {
        width: 820px; /* downsize our container to make the content feel a bit tighter and more cohesive. NOTE: this removes two full columns from the grid, meaning you only go to 14 columns and not 16. */
      }

      /* The white background content wrapper */
      .container > .content {
        background-color: #fff;
        padding: 20px;
        margin: 0 -20px; /* negative indent the amount of the padding to maintain the grid system */
        -webkit-border-radius: 0 0 6px 6px;
           -moz-border-radius: 0 0 6px 6px;
                border-radius: 0 0 6px 6px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
      }

      /* Page header tweaks */
      .page-header {
        background-color: #f5f5f5;
        padding: 20px 20px 10px;
        margin: -20px -20px 20px;
      }

      /* Styles you shouldn't keep as they are for displaying this base example only */
      .content .span10,
      .content .span4 {
        min-height: 500px;
      }
      /* Give a quick and non-cross-browser friendly divider */
      .content .span4 {
        margin-left: 0;
        padding-left: 19px;
        border-left: 1px solid #eee;
      }

      .topbar .btn {
        border: 0;
      }

    </style>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>

  <body>
    <div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand" href="#"> ZRP  for total peace, stability and progress</a>        </div>
      </div>
    </div>

    <div class="container">

      <div class="content">
	 	
        <div class="page-header">
          <h1>Login to the system</h1>
        </div>
        
		<form name="form1" method="post" action="">
		  <table width="200" border="1">
            <tr>
              <td width="28%" rowspan="3"><img src="logo.jpg" width="204" height="131"></td>
              <td width="9%">Username</td>
              <td width="29%"><input type="text" name="username" id="username"></td>
              <td width="34%" rowspan="3" valign="top"><p>Quick retrival and disemination of information on criminal related matters has   immense benefits.</p>
              <p><a href="#">Readmore</a></p></td>
            </tr>
            <tr>
              <td>Password</td>
              <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>
              	<input name="login" type="submit" class="btn info" id="login" value=" Login ">
                <br><br>
                <div id="error" style="color:#FF0000"><?php echo $err;?></div>               </td>
            </tr>
          </table>
        </form>
      </div>
		
	 <footer>
        <p>&nbsp;</p>
      </footer>

    </div> <!-- /container -->
  </body>
</html>
