<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
?> 
	<script language="javascript">
		function validate(){
		
			if($("#password3").val() != $("#password2").val()){
				$("#error").fadeIn();
				$("#error").html("Passwords do not match.");
				$("#error").fadeOut(3000);
				return false;
			}
			return true;
		}
    </script>
 <form name = "frm1" method = "post" onsubmit="return validate()">
 	<table width="372" height="149" border = "0">
	<tr>
	  <td>Old Password</td>
	  <td><input type = "password" name = "password1" id="password1" /></td></tr>
	<tr>
	  <td>New Password</td>
	  <td><input type = "password" name = "password2" id="password2" /></td></tr>
	<tr>
	  <td>Retype Password</td>
	  <td><input type = "password" name = "password3" id="password3" /></td></tr>
	
	
	<tr><td colspan = "2"><input type = "submit" value = " Change Password " name = "save" class="btn info"/></td></tr>
	</table>
 </form>
	<?php 
	
	if(isset($_POST["save"])){
		$rs = $dbManager->getCustomQuery("select * from user where username like '".$_SESSION['username']."'");
		if($rs[0]['password'] != $_REQUEST['password1']){
			$err = true;
			?>			
				<script language="javascript">
					$("#error").fadeIn();
					$("#error").html("Invalid old password.");
					$("#error").fadeOut(3000);
				</script>
			<?php

		}
		if(!$err){
			$saveArray["password"] = $_REQUEST["password2"];
			$dbManager->updateSingleRecord("user", $saveArray, $_SESSION['user_id']);			
			?>			
				<script language="javascript">
					$("#info").fadeIn();
					$("#info").html("Password successfully saved.");
					$("#info").fadeOut(3000);
				</script>
			<?php

		}
		
	}
	 ?>