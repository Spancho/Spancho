<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	
	$rs = $dbManager->getCustomQuery("select * from cellphone");

	 ?> 
   	<script language="javascript">
		function printPage() { print(document); }
    </script>

     <h3>Stolen Cellhones</h3>
     <hr />

<table width = "90%" cellpadding="1" cellspacing="1" bgcolor="#000000">

  <tr > 
	<th>CR #</th>
	<th>Item Name </th>
	<th>Description</th>
	<th>Identfying Marks / Serial </th>
	<th>Registered Owner</th>
	<th>Contact Details</th>
	</tr> <?php
	for($x = 0 ; $x < count($rs); $x++){
		 ?> <tr style="cursor:pointer" onclick="loadDetails('<?php echo $rs[$x]["id"]; ?>')">

		<td><?php echo $rs[$x]["cr_no"]; ?></td>

		<td><?php echo $rs[$x]["item_name"]; ?></td>
		<td><?php echo $rs[$x]["description"]; ?></td>

		<td><?php echo $rs[$x]["identity"]; ?></td>

		<td><?php echo $rs[$x]["registered_owner"]; ?></td>

		<td><?php echo $rs[$x]["contact_details"]; ?></td>

		</tr> <?php 

	}

	?> </table>
  
<p><button onclick="printPage()"> Print </button></p>
    