<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	 ?> 
	 <form name = "frm1" method = "post"><table border = "0">
	<tr><td>national_id</td><td><input type = "text" name = "national_id" /></td></tr>
	<tr><td>full_names</td><td><input type = "text" name = "full_names" /></td></tr>
	<tr><td>residental_address</td><td><input type = "text" name = "residental_address" /></td></tr>
	
	<tr><td colspan = "2"><input type = "submit" value = "Save" name = "save"/></td>
	</table></form>
	<?php 
	if(isset($_POST["save"])){
		$saveArray["national_id"] = $_REQUEST["national_id"];
		$saveArray["full_names"] = $_REQUEST["full_names"];
		$saveArray["residental_address"] = $_REQUEST["residental_address"];
		
	if(empty($_REQUEST["id"]) || $_REQUEST["id"] == 0)
		$dbManager->saveSingleRecord("person", $saveArray);
	else
		$dbManager->updateSingleRecord("person", $saveArray, $_REQUEST["id"]);
	}
	 ?>