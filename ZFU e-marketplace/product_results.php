<?php
//session_start();
error_reporting(0);
if(!isset($_SESSION['logged'])){
die('<script language=javascript> location=("index.php");</script>');
}
?>
<?php
session_start();
include("connection/db_con.php");
foreach($_POST as $key=>$value){
	$$key = $value;
}
$query = mysql_query("SELECT * FROM products WHERE category='$contract' and pname='$status'") or die(mysql_error());
$result = mysql_fetch_array($query);
$_SESSION['status'] = $status;
if($result > 0){
echo "<table width='500'><tr><th></th><th>ID Number</th><th>First Name</th><th>Last Name</th><th>Contract</th><th>Land Size(Ha)</th><th>Location</th></tr>";
$num = 1;
$reportDetails = array();
do{
	$name = mysql_query("SELECT * FROM farmer WHERE farmerid='$result[farmerid]'");
	$getname = mysql_fetch_assoc($name);
	
	$reportDetails[] = array('idno'=>$getname['idno'],'firstname'=>$getname['firstname'],
						'lastname'=>$getname['lastname'],'contract'=>$result['contract'],
						'landsize'=>$result['landsize'],'location'=>$result['location']);
	echo "<tr align='center'><td>".$num."</td>";
	echo "<td>".$getname['idno']."</td>";
	echo "<td>".$getname['firstname']."</td>";
	echo "<td>".$getname['lastname']."</td>";
	echo "<td>".$result['contract']."</td>";
	echo "<td>".$result['landsize']."</td>";
	echo "<td>".$result['location']."</td></tr>";
	$num ++;
}while($result = mysql_fetch_array($query));
echo "</table>";
$_SESSION['report'] = $reportDetails;
echo '<a href="http://localhost/farmerscontracontractingcherwon/report.php">Print Contracts';
}else{
	echo "NO RESULTS FOUND!";
}
?>