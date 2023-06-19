<?php
//session_start();
error_reporting(0);
if(!isset($_SESSION['logged'])){
die('<script language=javascript> location=("index.php");</script>');
}
?>
<?php
  include("connection/db_con.php");

$result = mysql_query("SELECT * FROM chat ORDER BY id ASC LIMIT 0, 10");
while($row=mysql_fetch_array($result)){
	
	echo "<span class='tyym'>" . date("d M Y: h:i ",$row['tym']) ."</span><span class='uname'>" . $row['nam'] . "</span>: <span class='msg'>" . $row['msg'] . "</span></br></br>";
}
mysql_close($con);
?>