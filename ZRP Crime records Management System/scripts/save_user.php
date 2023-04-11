<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	 ?> 
		<script language="javascript">
		function validate(){
		
			if($("#full_name").val() == ''){
				$("#error").fadeIn();
				$("#error").html("Please enter the full name.");
				$("#error").fadeOut(3000);
				return false;
			}

		
			if($("#username").val() == ''){
				$("#error").fadeIn();
				$("#error").html("Please enter the username.");
				$("#error").fadeOut(3000);
				return false;
			}

			if($("#password").val() == ''){
				$("#error").fadeIn();
				$("#error").html("Please enter the password.");
				$("#error").fadeOut(3000);
				return false;
			}
	
			return true;
		}
	</script>

	 <form name = "frm1" method = "post" onsubmit="return validate()"><table width="250" height="149" border = "0">
	<tr>
	  <td>Full name</td>
	  <td><input type = "text" name = "full_name" id="full_name" /></td></tr>
	<tr>
	  <td>Username</td>
	  <td><input type = "text" name = "username" id="username" /></td></tr>
	<tr>
	  <td>Password</td>
	  <td><input type = "text" name = "password" id="password" /></td></tr>
	<tr>
	  <td>Level</td>
	  <td><select name="level" id="level">
	    <option value="HQ">HQ</option>
	    <option value="Substation">Substation</option>
	    </select>
	  </td>
	</tr>
	
	<tr><td colspan = "2"><input type = "submit" value = "Save" name = "save" class="btn info"/></td></tr>
	</table></form>
	<?php 
	if(isset($_POST["save"])){
		$rs = $dbManager->getCustomQuery("select * from user where username like '".$_REQUEST['username']."'");
		if(count($rs) > 0){
			$err = true;
			?>			
				<script language="javascript">
					$("#error").fadeIn();
					$("#error").html("Username already registered, please select a different one.");
					$("#error").fadeOut(3000);
				</script>
			<?php

		}
		if(!$err){
			$saveArray["full_name"] = $_REQUEST["full_name"];
			$saveArray["username"] = $_REQUEST["username"];
			$saveArray["password"] = $_REQUEST["password"];
			$saveArray["level"] = $_REQUEST["level"];		
			$dbManager->saveSingleRecord("user", $saveArray);			
			?>			
				<script language="javascript">
					$("#info").fadeIn();
					$("#info").html("Record successfully saved.");
					$("#info").fadeOut(3000);
				</script>
			<?php

		}
		
	}
	 ?>