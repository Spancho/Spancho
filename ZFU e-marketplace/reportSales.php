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
<p><?php if ($_SESSION['level']=="company"){?>
   <a href="company1.php?page=allPurchases.php"> View All Purchases</a> 
   <?php
}
    else if ($_SESSION['level']=="admin"){?>
   <a href="admin1.php?page=allPurchases.php"> View All Purchases</a> 
   <?php }
   else if($_SESSION['level']=="farmer"){?>
      <a href="farmer.php?page=allPurchases.php"> View All Purchases</a> 

   <?php }?></p>
<hr/>
<br/>
<center><table border="0" width="75%" cellpadding="1" cellspacing="1">
	<tr>
		<td align="center"><form action="reportSalesResults.php" method="post">
		  <h2 style="font-style:oblique; text-decoration:blink ">
Enter Product Name or Date to search for: </h2>
		  <input type="text" name="name" id="search" required/>
		  <input name="submit" type="submit" style="font-style:italic"  value="search"/>
        </form></td>
	</tr>
	</table>
  </center>
  <?php

if (isset($_POST["submit"])){
$search = $_POST["name"];
$conn = mysql_connect("localhost","root", "");
mysql_select_db("farmersUnion");

$sql = "SELECT * FROM purchases WHERE product LIKE '$search%'";
$sql .= " OR date LIKE '$search%'";
$sql .= " OR id LIKE '$search%'";
$result = mysql_query($sql, $conn);
if (mysql_num_rows($result) > 0) {
	echo "<table bgcolor='#3399FF' border='1' name='contacts' width='100%'>"; 
	echo "<caption style='font-style:oblique'> Results</caption>";
	echo"<tr bgcolor='#FFFFFF' style='font-style:oblique'>";
	//echo "<th>Customer</th>";
	echo"<th>Date</th>";
	echo"<th>Product</th>";
	echo"<th>Quantity Bought</th>";
	echo"<th>Price/Unit</th>";
	echo"<th>Total cost</th>";
	echo"</tr>";
	
	
   while ($row = mysql_fetch_assoc($result)) {
	echo "<tr border='1'>";
	$sqlz = "SELECT units FROM products WHERE pname='$row[product]'";
 $resultz = mysql_query($sqlz, $conn);
 $rowz = mysql_fetch_assoc($resultz);
 
 // echo "<td>" . $row['pname'] ."</td>";
  echo "<td>" . $row['date'] ."</td>";
  echo "<td>" . $row['product']."</td>";
  echo "<td>" . $row['quant'].$rowz['units']."</td>";
  echo "<td>" . $row['priceperunit']."</td>";
  echo "<td>" . $row['total']."</td>";
  echo "</tr>";
   }
   echo"</table>";
   
}

 else {
	echo("<p>No results were found</p>");
}
}
?>
</body>
</html>
