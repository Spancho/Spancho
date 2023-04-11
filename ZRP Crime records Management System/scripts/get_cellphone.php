<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	
	if(isset($_POST['search']))
		$rs = $dbManager->getCustomQuery("select * from cellphone where identity like '%".$_POST['identity']."%'");
	else
		$rs = $dbManager->getCustomQuery("select * from cellphone order by id desc limit 20");

	 ?> 
   	<script language="javascript">
        function loadDetails(id){
            location = 'index.php?page=cellphone.php&id='+id;
        }
    </script>

     <h3>Search Stolen Cellphones</h3> [ <a href="scripts/print_cellphone.php" target="_blank">Print</a> ]
 <hr />
     <form action="" method="post" name="form1" id="form1">
       <strong>       Idetifying Marks / Serial # 
       <input type="text" name="full_names" id="full_names" value="<?php echo $_POST['identity'];?>" />     
       </strong>
       <input type="submit" name="search" id="search" value=" Search " class="btn success" />
     </form>

<table class="zebra-striped" width = "90%">

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
