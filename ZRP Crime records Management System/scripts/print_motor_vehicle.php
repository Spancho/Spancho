<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	
	$rs = $dbManager->getCustomQuery("select * from motor_vehicle");

	 ?> 
   	<script language="javascript">
		function printPage() { print(document); }
    </script>

     <h3>CBD Holders</h3>
     <hr />

<table width = "90%" cellpadding="1" cellspacing="1" bgcolor="#000000">

  <tr > 
	  <th>CR # </th>
	  <th>Registration # </th>
	  <th>Description</th>
	  <th>Engine #</th>
	  <th>Chasis #</th>
	  <th>Registered Owner</th>
	  <th>Contact details</th>
	</tr> <?php
	for($x = 0 ; $x < count($rs); $x++){
		 ?> 
         <tr >

            <td><?php echo $rs[$x]["cr_no"]; ?></td>
    
            <td><?php echo $rs[$x]["registration_no"]; ?></td>
    
            <td><?php echo $rs[$x]["description"]; ?></td>
    
            <td><?php echo $rs[$x]["engine_no"]; ?></td>
    
            <td><?php echo $rs[$x]["chasis_no"]; ?></td>

            <td><?php echo $rs[$x]["registered_owner"]; ?></td>
            
            <td><?php echo $rs[$x]["contact_details"]; ?></td>                        
		</tr> <?php 

	}

	?></table>
<p><button onclick="printPage()"> Print </button></p>
    