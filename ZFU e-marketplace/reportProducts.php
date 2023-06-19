<?php
//session_start();
error_reporting(0);
if(!isset($_SESSION['logged'])){
die('<script language=javascript> location=("index.php");</script>');
}
?>
<html>
<head><title>ZFU</title></head>
<body>
<center>
<br/>
<center><table border="0" width="75%" cellpadding="1" cellspacing="1">
	<tr>
		<td align="center"><form action="" method="post">
		  <h2 style="font-style:oblique; text-decoration:blink ">
Enter Name or Category or ID of the Product to search for: </h2>
		  <input type="text" name="name" id="search" required/>
		  <input name="submit" type="submit" style="font-style:italic"  value="search"/>
        </form></td>
	</tr>
	</table></center>
    <div class="cleared reset-box"></div>
<div class="art-header">
                <div class="art-logo">
                                                                         <h4 class="art-logo-text"> Results Found</h4>
                                                </div>
                
            </div>
            <div class="cleared reset-box"></div>
<div>
<br><br>
<center><h5 style="font-style:oblique">
<?php

if (isset($_POST["submit"])) {
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
</h5></center>
</div>
<?php 
}
?>

                          <div class="cleared"></div>
	<div>&nbsp;</div>
	<div>&nbsp;</div>
	
	
</body>
</html>
