<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>ZFU</title>



    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>
   <style type="text/css">
.art-post .layout-item-0 { padding-right: 10px;padding-left: 10px; }
.art-post .layout-item-1 { color: #353635; background:repeat #F0F0F0; padding-right: 10px;padding-left: 10px; }
   .ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
   .ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
   </style>

</head>
<body>
<div id="art-page-background-glare-wrapper">
    <div id="art-page-background-glare"></div>
</div>
<div id="art-main">
    <div class="cleared reset-box"></div>
    <div class="art-box art-sheet">
        <div class="art-box-body art-sheet-body">
<div class="art-bar art-nav">
<div class="art-nav-outer">
</div>
</div>
<div class="cleared reset-box"></div>
<div class="art-header">
                <div class="art-logo">
                                                                         <h2 class="art-logo-text"> Results Found</h2>
                                                </div>
                
            </div>
            <div class="cleared reset-box"></div>
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content">
<div class="art-box art-post">
<br><br>
<center><h2 style="font-style:oblique">
<?php

if (!isset($_POST["name"])) {
	header("Location: reportProductsResults.php");
	die();
}
$search = $_POST["name"];
$conn = mysql_connect("localhost","root", "");
mysql_select_db("farmersUnion");

$sql = "SELECT * FROM products WHERE pname LIKE '$search%'";
$sql .= " OR category LIKE '$search%'";
$sql .= " OR id LIKE '$search%'";
$result = mysql_query($sql, $conn);
if (mysql_num_rows($result) > 0) {
	echo "<table bgcolor='#3399FF' border='1' name='contacts' width='100%'>"; 
	echo "<caption style='font-style:oblique'>Product Results</caption>";
	echo"<tr bgcolor='#FFFFFF' style='font-style:oblique'>";
	echo "<th>Product's Name</th>";
	echo"<th>Category</th>";
	echo"<th>Description</th>";
	echo"<th>Price/unit</th>";
	echo"<th>Product ID</th>";
	echo"<th>Company</th>";
	echo"</tr>";
	
	
   while ($row = mysql_fetch_assoc($result)) {
	echo "<tr border='1'>";
	$sqlz = "SELECT name FROM companies WHERE id='$row[companyid]'";
 $resultz = mysql_query($sqlz, $conn);
 $rowz = mysql_fetch_assoc($resultz);
 
  echo "<td>" . $row['pname'] ."</td>";
  echo "<td>" . $row['category'] ."</td>";
  echo "<td>" . $row['description']."</td>";
  echo "<td>" . $row['price']."</td>";
  echo "<td>" . $row['id']."</td>";
  echo "<td>" . $rowz['name']."</td>";
  echo "</tr>";
   }
   echo"</table>";
   
}

 else {
	echo("<p>No results were found</p>");
}
?>
<a href='reportProducts.php'><h4 style="text-decoration:blink; font-style:oblique">BACK TO SEARCH PAGE</h4></a>
</h2></center>
</div>

                          <div class="cleared"></div>
                        </div>
                  </div>
                </div>
            </div>
            <div class="cleared"></div>
            
    		<div class="cleared"></div>
        </div>
    </div>
    <div class="art-footer">
        <div class="art-footer-body">
            <div class="art-footer-center">
                <div class="art-footer-wrapper">
                    <div class="art-footer-text">
                        <p align="center"> Zimbabwe Farmers Union</p>
                        <div class="cleared"></div>
                        <p class="art-page-footer"></p>
                    </div>
                </div>
            </div>
            <div class="cleared"></div>
        </div>
    </div>
    <div class="cleared"></div>
</div>

</body>
</html>
