<?php
	@session_start();
	if(!$_SESSION['logged_in']){
		?>
        	<script language="javascript">
				location = 'login.php';
			</script>
        <?php
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
          <a class="brand" href="#"> ZRP</a>
          <ul class="nav">
            <li><a href="index.php?page=get_person.php&active=save">Search Persons</a></li>			
			
            <?php // if($_SESSION['level'] == 'HQ'){ ?>
                <li class="dropdown" id="save" >
                  <a href="#save" class="dropdown-toggle">Save</a>
                  <ul class="dropdown-menu">
                    <li><a href="index.php?page=save_wanted_person.php&active=save">Wanted Persons</a></li>
                    <li><a href="index.php?page=save_cbd_holder.php&active=save">CBD Holders</a></li>              
                    <li><a href="index.php?page=save_recent_releases.php&active=save">Recent Releases</a></li>
                    <li><a href="index.php?page=save_modules_operandi.php&active=save">Modules Operandi</a></li>
                    
                    <li><a href="index.php?page=save_cellphone.php&active=save">Stolen Cellphones</a></li>              
                    <li><a href="index.php?page=save_motor_vehicle.php&active=save">Stolen Vehicles</a></li>
                    <li><a href="index.php?page=save_electrical_item.php&active=save">Stolen Electricals</a></li>
                    </ul>
                </li>
			<?php // } ?>
            
			<li class="dropdown" id="search">
              <a href="#search" class="dropdown-toggle">Search</a>
              <ul class="dropdown-menu">
                <li><a href="index.php?page=get_wanted_person.php&active=search">Wanted Persons</a></li>
                <li><a href="index.php?page=get_cbd_holder.php&active=search">CBD Holders</a></li>              
                <li><a href="index.php?page=get_recent_releases.php&active=search">Recent Releases</a></li>
				<li><a href="index.php?page=get_modules_operandi.php&active=search">Modules Operandi</a></li>

                <li><a href="index.php?page=get_cellphone.php&active=save">Stolen Cellphones</a></li>              
                <li><a href="index.php?page=get_motor_vehicle.php&active=save">Stolen Vehicles</a></li>
                <li><a href="index.php?page=get_electrical_item.php&active=save">Stolen Electricals</a></li>
				
			</ul>
            </li>

			<?php if($_SESSION['level'] == 'HQ'){ ?>	
                <li class="dropdown" id="users">
                  <a href="#users" class="dropdown-toggle">User Management</a>
                  <ul class="dropdown-menu">
                    <li><a href="index.php?page=save_user.php">Add a user</a></li>
                    <li><a href="index.php?page=get_user.php">Manage users</a></li>              
                  </ul>
                </li>
			<?php } ?>
            
            <?php if($_SESSION['level'] == 'HQ'){ ?>
	            <li><a href="index.php?page=change_password.php">Change Password</a></li>
             <?php } else { ?>
             	<li><a href="index.php?page=change_password.php">Change Password</a></li>
             <?php } ?>
            <li><a href="logout.php">Logout</a></li>	            					           
          </ul>
          <form action="" class="pull-right" method="post">
            <input class="input-medium" type="text" placeholder="Full name" name="full_names">
			<input name="page" type="hidden" value="get_person.php">
            <button class="btn" type="submit" name="search">Search</button>
          </form>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="content">
	  </br>
	  </br>
	  </br>
	 	<div id="error" style="color:#FF0000"></div>
		<div id="info" style="color:#00CC00"></div>

        <div class="page-header">
          <h1><?php echo $_REQUEST["title"];?> <small><?php echo $_REQUEST['tip'];?></small></h1>
        </div>
		<?php 
			if(isset($_REQUEST['page']))
				include("scripts/".$_REQUEST['page']);
		?>
      </div>
		
	 <footer>
        <p>&nbsp;</p>
      </footer>

    </div> <!-- /container -->
	<script language="javascript">
		$(".dropdown-toggle").dropdown();
	</script>
  </body>
</html>
