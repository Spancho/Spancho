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
</head>

<body class="no-main-slider">


  
	<div id="loading-wrap">
		<div id="loading">
      <i class="fa fa-cog fa-spin"></i>
    </div>
	</div>

  <header class="home-header"> <!-- header -->
    
    <nav class="navbar navbar-default" role="navigation">
	    <div class="container">
        <div class="navbar-inner">          
          <!-- logo-->                       
					<a href="index.html" title="Home" class="logo pull-left"><img src="img/logo.png " alt="logo"></a>            <?php include("customermenu.html"); ?>  

          <!-- logo ends -->         
          
          <!-- Menu --> 
          <ul class="nav pull-left" id="nav">
            <li><a href="index.html" title="">Home</a></li>
            <li><a href="catalog-right.html" title="">Catalog</a>
              <ul>
                <li><a href="catalog-right.html">Right sidebar</a></li>
                <li><a href="catalog-left.html">Left sidebar</a></li>
                <li><a href="catalog.html">Without sidebar</a></li>
                <li><a href="product-detail.html">Product detail</a></li>
              </ul>
            </li>
            <li><a href="components.html" title="">Pages</a>
              <!-- sub menu -->
              <ul>
                <li><a href="components.html" title="">Components</a></li>  
                <li><a href="about-us.html" title="">About us</a></li>
                <li><a href="services.html" title="">Services</a></li>
                <li><a href="gallery-4.html" title="">Gallery</a>
                  <!-- sub sub menu -->  
                  <ul>
                    <li><a href="gallery-4.html" title="">Gallery 4 columns</a></li>
                    <li><a href="gallery-3.html" title="">Gallery 3 columns</a></li>
                    <li><a href="gallery-2.html" title="">Gallery 2 columns</a></li>  
                  </ul>                  
                  <!-- sub sub menu ends -->
                </li>                
              </ul>
              <!-- sub menu ends -->
            </li>
            <li class="selected"><a href="shop-right.html" title="">Shop</a>
              <ul>
                <li class="selected"><a href="shop-right.html">Right sidebar</a></li>
                <li><a href="shop-left.html">Left sidebar</a></li>
                <li><a href="shop.html">Without sidebar</a></li>
                <li><a href="shop-product-detail.html">Shop Product detail</a></li>
                <li><a href="shop-cart.html">Cart</a></li>
                <li><a href="shop-checkout.html">Checkout</a></li>
              </ul>            
            </li>            
            <li><a href="blog-right.html" title="">Blog</a>
              <ul>
                <li><a href="blog-right.html">Right sidebar</a></li>
                <li><a href="blog-left.html">Left sidebar</a></li>
                <li><a href="blog.html">Without sidebar</a></li>
                <li><a href="blog-masonry.html">Blog masonry</a></li>
                <li><a href="blog-detail.html">Blog detail</a></li>
              </ul>            
            </li> 
            <li><a href="contact.html" title="">Contact</a></li>                        
          </ul>
          <!-- Menu ends -->
          <div class="menu-right-bar">
            <ul class="menu-right-bar-ul">
            <li class="text hidden-sm hidden-xs"></li>
            <li><a href="shop-cart.html" class="button btn btn-primary" role="button"><i class="fa fa-shopping-cart"></i> (2)</a></li> 
            <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#singInForm">Sign in</button></li>
            </ul>
          </div>
        </div>  
      </div>           
    </nav>         
    <!-- Modal -->
    <div class="modal fade" id="singInForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h3 class="modal-title" id="myModalLabel">Please Sing Up</h3>
          </div>
          <div class="modal-body">
          <div class="form-group">
            <label for="login-name" class="control-label">Login name:</label>
            <input type="text" class="form-control" id="login-name">
          </div>
          <div class="form-group">
            <label for="password" class="control-label">Password:</label>
            <input type="password" class="form-control" id="password">
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Log in</button>
          </div>
        </div>
      </div>
    </div>   
  </header>
  
  <section>
    

   
    
    
          
    <div class="page-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="page-title">Shop</div>
            <ol class="breadcrumb">
              <li><a href="index.html">Home</a></li>
              <li><a href="shop-right.html">Shop</a></li>
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
      
        <div class="row">
        <div class="col-sm-6">
         <h4 class="margin-small">Showing 1–9 of 25 results</h4>
        </div>
                <div class="col-sm-6">
                <div class="search-result-heading-shop">
                  <div class="search-result form-group">
                  <select class="form-control selectpicker" id="sel1" data-style="btn-default">
                    <option>Price (Low to High)</option>
                    <option>Price (Hight to Low)</option>
                    <option>Name (A to Z)</option>
                    <option>Name (Z to A)</option>
                  </select>
                </div> 
            </div>
            
            </div>

           
           </div>        
      <div class="row">
      
      <div class="col-sm-4"> 
        <div class="shop-item-container">
          <div class="shop-item-media">
            <img src="img/shop/1.jpg" alt="">
          </div>
          <div class="shop-item-content">
            <div class="title"><a href="shop-product-detail.html">Shop item</a></div>
            <span class="ratings threehalf"></span>                
            <div class="price"><span class="old">$ 145</span>$ 125</div>
            <a href="shop-product-detail.html" class="btn btn-default bnt-sm" role="button">Add to cart</a>
          </div>                          
        </div>
      </div>        
      
      <div class="col-sm-4"> 
        <div class="shop-item-container">
          <div class="shop-item-media">
            <img src="img/shop/2.jpg" alt="">
          </div>
          <div class="shop-item-content">
            <div class="title"><a href="shop-product-detail.html">Shop item</a></div>
            <span class="ratings four"></span>                
            <div class="price">$ 125</div>
            <a href="shop-product-detail.html" class="btn btn-default bnt-sm" role="button">Add to cart</a>
          </div>                          
        </div>
      </div> 

      <div class="col-sm-4"> 
        <div class="shop-item-container">
          <div class="shop-item-media">
            <img src="img/shop/3.jpg" alt="">
          </div>
          <div class="shop-item-content">
            <div class="title"><a href="shop-product-detail.html">Shop item</a></div>
            <span class="ratings zero"></span>                
            <div class="price">$ 125</div>
            <a href="shop-product-detail.html" class="btn btn-default bnt-sm" role="button">Add to cart</a>
          </div>                          
        </div>
      </div> 
            
      </div>

      <div class="row">
      
      <div class="col-sm-4"> 
        <div class="shop-item-container">
          <div class="shop-item-media">
            <img src="img/shop/4.jpg" alt="">
          </div>
          <div class="shop-item-content">
            <div class="title"><a href="shop-product-detail.html">Shop item</a></div>
            <span class="ratings"></span>                
            <div class="price">$ 125</div>
            <a href="shop-product-detail.html" class="btn btn-default bnt-sm" role="button">Add to cart</a>
          </div>                          
        </div>
      </div>        
      
      <div class="col-sm-4"> 
        <div class="shop-item-container">
          <div class="shop-item-media">
            <img src="img/shop/5.jpg" alt="">
          </div>
          <div class="shop-item-content">
            <div class="title"><a href="shop-product-detail.html">Shop item</a></div>
            <span class="ratings fourhalf"></span>                
            <div class="price">$ 125</div>
            <a href="shop-product-detail.html" class="btn btn-default bnt-sm" role="button">Add to cart</a>
          </div>                          
        </div>
      </div> 

      <div class="col-sm-4"> 
        <div class="shop-item-container">
          <div class="shop-item-media">
            <img src="img/shop/6.jpg" alt="">
          </div>
          <div class="shop-item-content">
            <div class="title"><a href="shop-product-detail.html">Shop item</a></div>
            <span class="ratings fourhalf"></span>                
            <div class="price">$ 125</div>
            <a href="shop-product-detail.html" class="btn btn-default bnt-sm" role="button">Add to cart</a>
          </div>                          
        </div>
      </div> 
            
      </div>
      
      <div class="row">
      
      <div class="col-sm-4"> 
        <div class="shop-item-container">
          <div class="shop-item-media">
            <img src="img/shop/7.jpg" alt="">
          </div>
          <div class="shop-item-content">
            <div class="title"><a href="shop-product-detail.html">Shop item</a></div>
            <span class="ratings fourhalf"></span>                
            <div class="price">$ 125</div>
            <a href="shop-product-detail.html" class="btn btn-default bnt-sm" role="button">Add to cart</a>
          </div>                          
        </div>
      </div>        
      
      <div class="col-sm-4"> 
        <div class="shop-item-container">
          <div class="shop-item-media">
            <img src="img/shop/8.jpg" alt="">
          </div>
          <div class="shop-item-content">
            <div class="title"><a href="shop-product-detail.html">Shop item</a></div>
            <span class="ratings fourhalf"></span>                
            <div class="price">$ 125</div>
            <a href="shop-product-detail.html" class="btn btn-default bnt-sm" role="button">Add to cart</a>
          </div>                          
        </div>
      </div> 

      <div class="col-sm-4"> 
        <div class="shop-item-container">
          <div class="shop-item-media">
            <img src="img/shop/9.jpg" alt="">
          </div>
          <div class="shop-item-content">
            <div class="title"><a href="shop-product-detail.html">Shop item</a></div>
            <span class="ratings fourhalf"></span>                
            <div class="price">$ 125</div>
            <a href="shop-product-detail.html" class="btn btn-default bnt-sm" role="button">Add to cart</a>
          </div>                          
        </div>
      </div> 
            
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
                <li><a href="#">Art</a></li>
                <li><a href="#">Music</a></li>
                <li><a href="#">Drupal</a></li>
                <li><a href="#">Hardstyle</a></li>               
              </ul>            
          </div>                  
        </div>

        <div class="r-bg">
          <div class="widget">
            <h4>Text widget</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sit amet feugiat massa. Suspendisse vehicula arcu et dui pellentesque sollicitudin.
              </p>                        
          </div>       
        </div>
        
        <div class="r-bg">
          <div class="widget">
            <h4>Latest comments</h4>
            <ul class="list-1">
              <li>Entiri on <a href="#">Honda CRX</a></li>
              <li>John Doe on <a href="#">Toyota MX5</a></li>
              <li>Samantha <a href="#">BMW X5</a></li>
              <li>Elizbeth <a href="#">Porsche 911</a></li>
            </ul>
          </div>        
        </div>
        
        <div class="r-bg">
          <div class="widget">
            <h3>Recent news</h3>
            <ul class="news-box-ul">
              <li>
                <span class="image">
                  <img src="img/latest-blog/1.jpg" alt="">
                </span>
                <div class="table-content">
                <span class="title">
                    <a href="blog-detail.html">The journey of the Beatles</a>
                </span>
                <span class="text">by Yino Huan</span>
                </div>
              </li>
              <li>
                <span class="image">
                  <img src="img/latest-blog/2.jpg" alt="">
                </span>
                <div class="table-content">
                <span class="title">
                    <a href="blog-detail.html">The journey of the Beatles</a>
                </span>
                <span class="text">by Yino Huan</span>
                </div>
              </li>
              <li>
                <span class="image">
                  <img src="img/latest-blog/3.jpg" alt="">
                </span>
                <div class="table-content">
                <span class="title">
                    <a href="blog-detail.html">The journey of the Beatles</a>
                </span>
                <span class="text">by Yino Huan</span>
                </div>
              </li>              
            </ul>
          </div>
          </div>        
      
      </div>     
    
    
    
    </div>
    
   </div>
   <div class="spacer20"></div>

   <div class="spacer40"></div>
      
   
     
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
                  <img src="products/<?php echo $fetch['pic']; ?>" alt="">
                </div>
                <div class="related-item-content">
                  <div class="title"><a href="product.php? id=<?php echo $fetch['id']; ?>"><?php echo $fetch['pname']; ?></a></div>
                  <span class="ratings fourhalf"></span>
                  <div class="price"><span class="old">$ 145</span>$ <?php echo $fetch['price']; ?></div>
                  <a href="product.php? id=<?php echo $fetch['id']; ?>" class="btn btn-default btn-sm" role="button">Add to cart</a>
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