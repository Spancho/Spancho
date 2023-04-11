<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	 ?> 
	<?php 
	if(isset($_POST["save"])){
		$rs = $dbManager->getCustomQuery("select * from motor_vehicle where registration_no like '".$_REQUEST['registration_no']."'");
		if(count($rs) > 0){
			$err = true;
			?>			
				<script language="javascript">
					$("#error").fadeIn();
					$("#error").html("Registration number already in database.");
					$("#error").fadeOut(3000);
				</script>
			<?php

		}
		if(!$err){
			$saveArray["cr_no"] = $_REQUEST["cr_no"];
			$saveArray["registration_no"] = $_REQUEST["registration_no"];
			$saveArray["description"] = $_REQUEST["description"];
			$saveArray["engine_no"] = $_REQUEST["engine_no"];
			$saveArray["chasis_no"] = $_REQUEST["chasis_no"];
			$saveArray["registered_owner"] = $_REQUEST["registered_owner"];
			$saveArray["contact_details"] = $_REQUEST["contact_details"];
			
			if(empty($_REQUEST["id"]) || $_REQUEST["id"] == 0)
				$dbManager->saveSingleRecord("motor_vehicle", $saveArray);
			else
				$dbManager->updateSingleRecord("motor_vehicle", $saveArray, $_REQUEST["id"]);
			?>			
				<script language="javascript">
					$("#info").fadeIn();
					$("#info").html("Record successfully saved.");
					$("#info").fadeOut(3000);
					location = 'index.php?page=get_motor_vehicle.php';
				</script>
			<?php

		}
		
	}
	 ?>	 
		<script language="javascript">
		function validate(){
		
			if($("#registration_no").val() == ''){
				$("#error").fadeIn();
				$("#error").html("Please enter the vehicle registration number.");
				$("#error").fadeOut(3000);
				return false;
			}
	
			return true;
		}
	</script>

	 <form name = "frm1" method = "post" onsubmit="return validate()"><table width="250" height="149" border = "0">
	<tr>
	  <td>CR #</td>
	  <td><input type = "text" name = "cr_no" id=""cr_no"" /></td></tr>
	<tr>
	  <td>Registration #</td>
	  <td><input type = "text" name = "registration_no" id="registration_no" /></td></tr>
	<tr>
	  <td>Description</td>
	  <td><input type = "text" name = "description" id="description" /></td></tr>
	
	<tr>
	  <td>Engine #</td>
	  <td><input type = "text" name = "engine_no" id="engine_no" /></td>
	</tr>
	
	<tr>
	  <td>Chasis #</td>
	  <td><input type = "text" name = "chasis_no" id=""chasis_no"" /></td>
	</tr>

	<tr>
	  <td>Registered owner</td>
	  <td><input type = "text" name = "registered_owner" id="registered_owner" /></td>
	</tr>
	
	<tr>
	  <td>Contact details</td>
	  <td><input type = "text" name = "contact_details" id="contact_details" /></td>
	</tr>
	
	<tr><td colspan = "2"><input type = "submit" value = "Save" name = "save" class="btn info"/></td></tr>
	</table></form>
