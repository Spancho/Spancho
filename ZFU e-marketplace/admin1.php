<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['logged'])){
die('<script language=javascript> location=("index.php");</script>');
}
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="not-ie" lang="en"> <!--<![endif]-->
<head>
	<!-- Basic Meta Tags -->
  <meta charset="utf-8">
  <title>ZFU</title>
	<meta name="description" content="your description">
	<meta name="keywords" content="your keywords">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->
  <link href="img/favicon.png" rel="icon" type="image/png">
  <!-- Bootstrap style -->
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
  <!-- Font Awesome Style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" media="screen" />
  <!-- Animate Style -->
  <link href="css/animate.css" rel="stylesheet" media="screen" />
  <!-- Flexslider Style -->
  <link href="css/flexslider.css" rel="stylesheet" media="screen" />       
  <!-- Lightbox -->
  <link href="css/magnific-popup.css" rel="stylesheet" media="screen" />     
	<!-- Style css -->
  <link href="css/style.css" rel="stylesheet" media="screen" /> 
	<!-- Components css -->
  <link href="css/components.css" rel="stylesheet" media="screen" /> 
	<!-- Color style css -->
  <link href="css/color/color-1.css" rel="stylesheet" media="screen" id="color" /> 
	<!-- Responsive css -->
  <link href="css/responsive.css" rel="stylesheet" media="screen" />
  <!-- Google Web Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Asap:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Cabin:400,600' rel='stylesheet' type='text/css'> 
  <!-- Internet Explorer condition - HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
  <!-- Modernizr js -->        
	<script src="js/modernizr.js"></script>
    <style type="text/css">
body{
	background-color:#9C6;
	background-image: url(images/silos.jpg);

}
#container {
width: 800px;
margin-left: auto;
margin-right: auto;
text-align: left;  
border: 1px solid #ccc; 
   margin-top: auto;
margin-bottom: auto;
background:#FFF; 
-webkit-box-shadow: 10px 15px 10px #0E6919;  
-moz-box-shadow: 10px 15px 10px #0E6919;  
-ms-box-shadow: 10px 15px 10px #0E6919;  
box-shadow: 10px 15px 10px #0E6919; 

 padding:0;
}

    </style>
</head>

<body class="no-main-slider">


  
	<!--<div id="loading-wrap">
		<div id="loading">
      <i class="fa fa-cog fa-spin"></i>
    </div>
	</div>-->

  <header class="home-header"> <!-- header -->
    
    <nav class="navbar navbar-default" role="navigation">
	    <div class="container">
        <div class="navbar-inner">          
          <!-- logo-->                       
					<a href="index.html" title="Home" class="logo pull-left"><img src="img/logo.png " alt="logo"></a>           

          <!-- logo ends -->         
          
          <!-- Menu --> 
           <?php include("adminmenu.html"); ?>  
          <!-- Menu ends -->
          <div class="menu-right-bar">
            <ul class="menu-right-bar-ul">
            <li class="text hidden-sm hidden-xs"></li>
            </ul>
          </div>
        </div>  
      </div>           
    </nav>         
    <!-- Modal -->
    
  </header>
  
  <section>
    

   
    
    
          
    <div class="page-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="page-title"></div>
            <ol class="breadcrumb">
              <li><a href="admin1.php">Home</a></li>
              <li><a href="admin1.php?page=vproducts.php">Shop</a></li>
              <li class="active"></li>
            </ol>            
          </div>
        </div>
      </div>    
    </div> 
        
   <div class="container">
    

      <div class="row">     
    
      <div class="col-sm-9">
      <div class="r-bg">
      
       <div id="container" >

<body >

<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" >
  <table width="90%" border="0" cellspacing="0" cellpadding="0">
    
    <tr>
    
      <td>
      &nbsp;
	  <?php
$pg = @$_REQUEST['page'];
if($pg != "" && file_exists(dirname(__FILE__)."/".$pg)){
require(dirname(__FILE__)."/".$pg);
}elseif(!file_exists(dirname(__FILE__)."/".$pg))
include_once(dirname(__FILE__)."/pages/404.php");
else{
include_once("defaults.php");
}
?></td>
    </tr>
    <tr>
      <td>
  </td>
    </tr>
  </table>
</form>
</body>
</div> 
      
    
      
      </div>
    <div class="spacer20"></div>  
    <div class="row">
      <div class="col-md-12">
          
      </div>
      </div>        
    </div>
      
         
      
      <div class="col-sm-3">
        
        <div class="r-bg">
          <div class="widget">
            <h3 class="big">Filter price</h3>
            <input type="text" id="shop_price" name="example_name" value="" />
          </div>

          <div class="widget">          
            <h4>Search</h4>
            <div class="form-group">
              <input type="text" class="form-control" id="search" placeholder="Type and hit enter...">
            </div>
          </div>
        </div>
        <div class="r-bg">
          <div class="widget">
            <h4>Categories</h4>
              <ul class="list-1">
                <li><a href="admin1.php?page=buyers.php">Buyers</a></li>
                <li><a href="admin1.php?page=sellers.php">Sellers</a></li>
                               
              </ul>            
          </div>                  
        </div>

        
        <div class="r-bg">
          <div class="widget">
            <h3>Reports</h3>
            <ul class="news-box-ul">
              <li>
                
                                <div class="table-content">
                <li><a href="admin1.php?page=reportSales.php">Report_Purchases</a></li>
  <li><a href="admin1.php?page=vd_reg.php">Farmers</a>
		<li><a href="admin1.php?page=v_users.php">Users</a></li>
                </div>
              </li>            
            </ul>
          </div>
          </div>        
      
      </div>     
    
    
    
    </div>
    
   </div>

   <div class="f-bg big-padding"> 
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h3>Available Products</h3>
          <div class="related-items-slider">
		  <?php
  include("connection/db_con.php");
$query=mysql_query("SELECT * FROM products  ORDER BY id") or die(mysql_error());
while($fetch=mysql_fetch_array($query)){
	?>
            <div class="item">
              <div class="related-item-container">
                <div class="related-item-media">
                  <img src="products/<?php echo $fetch['pic'];?>" alt="" width="167" height="152" >
                </div>
                <div class="related-item-content">
                  <div class="title"><a href="product.php? id=<?php echo $fetch['id']; ?>"><?php echo $fetch['pname']; ?></a></div>
                  <span class="ratings fourhalf"></span>
                  <div class="price">$ <?php echo $fetch['price']; ?></div>
                  <a href="admin1.php?page=product.php && id=<?php echo $fetch['id'];?>" class="btn btn-default btn-sm" role="button" onClick="<?php redirectto("admin1.php?page=product.php");?>">Add to cart</a>
                </div>                          
              </div>
            </div>
            <?php
}
?>
            
            		
          </div>
        </div>      
      </div>
    </div>
    </div>
         

    <div class="promo-box">
      <div class="container">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1 col-xs-12">
            <form role="form">
            <div class="input-group">
              <span class="input-group-addon white hidden-xs">Subscribe to our newsletter</span>
              <input type="text" class="form-control white input-lg" placeholder="E-mail">
              <span class="input-group-addon">
                <button class="btn btn-inverted btn-lg text-right" type="button">Subscribe</button>
              </span>
            </div>
            </form>            
          </div>
        </div>       
      </div>
    </div>
     
  </section> <!-- section ends -->
         

  <footer class="footer">  <!-- footer -->
    <div class="footer-top">
      <div class="footer-top-bg">
        <div class="container">
          <div class="row">
            <div class="col-sm-3 col-xs-6">
            </div>
            <div class="col-sm-3 col-xs-6">
            </div>
            <div class="col-sm-3 col-xs-6">
             
            </div>
            <div class="col-sm-3 col-xs-6">
              <h4>Follow us</h4>
              <ul class="colored-social-icons-2">
                <li><a href="#" rel="external" class="facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" rel="external" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#" rel="external" class="twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" rel="external" class="dribbble"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#" rel="external" class="instagram"><i class="fa fa-instagram"></i></a></li>  
              </ul>
              <div class="spacer25"></div>
              <h4>Subscribe</h4>
              <form role="form">
                <div class="input-group">
                  <input type="text" class="form-control footer-form-control" placeholder="E-mail">
                  <span class="input-group-addon">
                    <button class="btn btn-default" type="button"> <i class="fa fa-angle-right"></i> </button>
                  </span>
                </div>
              </form>
            </div>
          </div>
        </div>      
      </div>
    </div>
    
    <div class="footer-bottom">
    
    </div>
    
  </footer> <!-- Footer ends -->
  <a href="#" class="back-to-top"><span></span></a>  
  <script src="js/jquery.js"></script>  
  <script src="js/bootstrap.min.js"></script>    
  <script src="js/jquery.easing.js"></script>    
  <script src="js/jquery.isotope.min.js"></script>   
  <script src="js/jquery.fitvids.js"></script>
  <script src="js/jquery.appear.js"></script>  
  <script src="js/retina.js"></script>
  <script src="js/respond.min.js"></script>  
  <script src="js/jquery.parallax-1.1.3.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.countTo.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.flexslider-min.js"></script>
  <script src="js/ion.rangeSlider.min.js"></script>    
  <script src="js/selectnav.js"></script>
  <script src="js/responsive-tabs.js"></script>
  <script src="js/bootstrap-select.min.js"></script>  
  <script src="js/functions.js"></script>  
	</body>
</html>