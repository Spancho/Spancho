<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
?>
	<?php 
	if(isset($_POST["save"])){
		
		$saveArray["cr_no"] = $_REQUEST["cr_no"];
		$saveArray["item_name"] = $_REQUEST["item_name"];
		$saveArray["description"] = $_REQUEST["description"];
		$saveArray["identity"] = $_REQUEST["identity"];
		$saveArray["registered_owner"] = $_REQUEST["registered_owner"];
		$saveArray["contact_details"] = $_REQUEST["contact_details"];
		
		if(empty($_REQUEST["id"]) || $_REQUEST["id"] == 0)
			$dbManager->saveSingleRecord("cellphone", $saveArray);
		else
			$dbManager->updateSingleRecord("cellphone", $saveArray, $_REQUEST["id"]);
		?>			
			<script language="javascript">
				$("#info").fadeIn();
				$("#info").html("Record successfully saved.");
				$("#info").fadeOut(3000);
				location = 'index.php?page=get_cellphone.php';
			</script>
		<?php
	}
	 ?>
     <?php	
	if(!empty($_GET['id']))
		$rs = $dbManager->getCustomQuery("select * from cellphone where id = ".$_GET['id']);

	$rs = $rs[0];	
		
	 ?> 
	 
	<script language="javascript">
		function validate(){		

			if($("#identity").val() == ''){
				$("#error").fadeIn();
				$("#error").html("Please enter identifying marks.");
				$("#error").fadeOut(3000);
				return false;
			}
			
			return true;
		}
	</script>

	 <form name = "frm1" method = "post" id="frm1" onsubmit="return validate()">
	 <table border = "0">
	
	<tr>
	  <td width="118">Identifying marks / Serial</td><td width="297"><input type = "text" name = "identity" id=""identity"" value="<?php echo $rs['"identity"'];?>" /></td></tr>
	<tr>
	  <td>CR #</td><td><input type = "text" name = "cr_no" id="cr_no" value="<?php echo $rs['cr_no'];?>" /></td></tr>
	<tr>
	  <td>Item name</td><td><input type = "text" name = "item_name" id="item_name" value="<?php echo $rs['item_name'];?>" /></td></tr>
	<tr>
	  <td>Description</td><td><input type = "text" name = "description" value="<?php echo $rs['description'];?>"/></td></tr>
	<tr>
	  <td>Registered Owner</td>
	  <td><input type = "text" name = "registered_owner" value="<?php echo $rs['registered_owner'];?>" /></td>
	  </tr>
	<tr>
	  <td>Contact details</td>
	  <td><input type = "text" name = "contact_details" value="<?php echo $rs['contact_details'];?>" /></td>
	  </tr>
	  
	  <tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  </tr>
		<tr><td colspan = "2"><input type = "submit" value = "Save" name = "save" class="btn info"/></td></tr>
	</table>
	 </form>
	 