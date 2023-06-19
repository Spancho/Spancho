
<?php
session_start();
	
$username = $_SESSION['username'];
$msg = $_REQUEST['msg'];
$tim=time();
  include("connection/db_con.php");

mysql_query("INSERT INTO chat(id,tym,nam, msg) VALUES(NULL,'$tim','$username','$msg')");

$result = mysql_query("SELECT * FROM chat ORDER BY id DESC LIMIT 0, 10");
while($row=mysql_fetch_array($result)){

echo "<span class='uname'>" . $row['nam'] . "</span>: <span class='msg'>" . $row['msg'] . "</span></br></br>";

}

?>
