<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();

	if(isset($_POST['search']))
		$rs = $dbManager->getCustomQuery("select * from motor_vehicle where registration_no like '%".$_POST['reg_no']."%'");
	else	
		$rs = $dbManager->getCustomQuery("select * from motor_vehicle order by id desc limit 20");

	 ?> 
	<script language="javascript">
        function loadDetails(id){
            location = 'index.php?page=motor_vehicle.php&id='+id;
        }
    </script>
     <h3>Search Wanted Vehicles</h3>
     [ <a href="scripts/print_motor_vehicle.php" target="_blank">Print</a> ]
<hr />
     <form action="" method="post" name="form1" id="form1">
       <strong>       Registration number 
       <input type="text" name="reg_no" id="reg_no" value="<?php echo $_POST['reg_no'];?>" />     
       </strong>
       <input type="submit" name="search" id="search" value=" Search " class="btn success" />
     </form>

     <table width = "90%" class="zebra-striped">

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
         <tr style="cursor:pointer" onclick="loadDetails('<?php echo $rs[$x]["id"]; ?>')">

            <td><?php echo $rs[$x]["cr_no"]; ?></td>
    
            <td><?php echo $rs[$x]["registration_no"]; ?></td>
    
            <td><?php echo $rs[$x]["description"]; ?></td>
    
            <td><?php echo $rs[$x]["engine_no"]; ?></td>
    
            <td><?php echo $rs[$x]["chasis_no"]; ?></td>

            <td><?php echo $rs[$x]["registered_owner"]; ?></td>
            
            <td><?php echo $rs[$x]["contact_details"]; ?></td>                        
		</tr> <?php 

	}

	?> </table>