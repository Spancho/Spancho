<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	
	if(isset($_GET['del'])){
		$dbManager->doQuery("delete from motor_vehicle where id = ".$_GET['del']);
		$dbManager->redirect("index.php?page=get_motor_vehicle.php");
	}

	$rs = $dbManager->getCustomQuery("select * from motor_vehicle where id = ".$_GET['id']);
	
	$x = 0;
	 ?> 
     <script language="javascript">
	 	function loadEdit(id){
			location = 'index.php?page=save_motor_vehicle.php&id='+id;
		}
		
		function del(id){
			if(confirm('Are you sure you want to delete this record?')){
				location = 'index.php?page=motor_vehicle.php&del='+id;
			}
		}
	 </script>
     
     <h3>Motor Vehicle</h3>
     <hr />

<table class="zebra-striped" width = "90%">

   	 	<tr style="cursor:pointer">
    	   <td width="29%"><strong>CR #</strong></td>
    	   <td width="71%"><?php echo $rs[$x]["cr_no"]; ?></td>
   	   </tr>
		<tr style="cursor:pointer">
    	   <td width="29%"><strong>Registration #</strong></td>
    	   <td width="71%"><?php echo $rs[$x]["registration_no"]; ?></td>
   	   </tr>
    	 <tr style="cursor:pointer">
    	   <td><strong>Description</strong></td>
    	   <td><?php echo $rs[$x]["description"]; ?></td>
   	   </tr>
    	 <tr style="cursor:pointer">
    	   <td><strong>Engine #</strong></td>
    	   <td><?php echo $rs[$x]["engine_no"]; ?></td>
   	   </tr>
    	 <tr style="cursor:pointer">
    	   <td><strong>Chasis #</strong></td>
    	   <td><?php echo $rs[$x]["chasis_no"]; ?></td>
   	   </tr>
    	 <tr style="cursor:pointer">
    	   <td><strong>Registered owner</strong></td>
    	   <td><?php  echo $rs[$x]["registered_owner"]; ?></td>
   	   </tr>
    	 <tr style="cursor:pointer">
    	   <td><strong>Contact details</strong></td>
    	   <td><?php echo $rs[$x]["contact_details"]; ?></td>
   	   </tr>
    	<?php if($_SESSION['level'] == 'HQ'){ ?>  
            <tr style="cursor:pointer">
    
            <td><button class="btn info" onclick="loadEdit('<?php echo $_GET['id'];?>')">Edit</button></td>
    
            <td><button class="btn error" onclick="del('<?php echo $_GET['id'];?>')">Delete</button></td>
            </tr> 
		<?php } ?>
      </table>
