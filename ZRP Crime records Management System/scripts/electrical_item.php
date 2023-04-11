<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	
	if(isset($_GET['del'])){
		$dbManager->doQuery("delete from electrical_item where id = ".$_GET['del']);
		$dbManager->redirect("index.php?page=get_electrical_item.php");
	}

	$rs = $dbManager->getCustomQuery("select * from electrical_item where id = ".$_GET['id']);
	
	$x = 0;
	 ?> 
     <script language="javascript">
	 	function loadEdit(id){
			location = 'index.php?page=save_electrical_item.php&id='+id;
		}
		
		function del(id){
			if(confirm('Are you sure you want to delete this record?')){
				location = 'index.php?page=electrical_item.php&del='+id;
			}
		}
	 </script>
     
     <h3>Stolen Electrical Item</h3>
     <hr />

<table class="zebra-striped" width = "90%">

    	 <tr style="cursor:pointer">
    	   <td width="29%"><strong>CR #</strong></td>
    	   <td width="71%"><?php echo $rs[$x]["cr_no"]; ?></td>
   	   </tr>
    	 <tr style="cursor:pointer">
    	   <td><strong>Item name</strong></td>
    	   <td><?php echo $rs[$x]["item_name"]; ?></td>
   	   </tr>
    	 <tr style="cursor:pointer">
    	   <td><strong>Description</strong></td>
    	   <td><?php echo $rs[$x]["description"]; ?></td>
   	   </tr>
    	 <tr style="cursor:pointer">
    	   <td><strong>Identifying marks</strong></td>
    	   <td><?php echo $rs[$x]["identity"]; ?></td>
   	   </tr>
    	
    	 <tr style="cursor:pointer">
    	   <td><strong>Registered owner</strong></td>
    	   <td><?php echo $rs[$x]["registered_owner"]; ?></td>
   	   </tr>
    	 <tr style="cursor:pointer">
    	   <td><strong>Contact details</strong></td>
    	   <td><?php echo $rs[$x]["contact_details"]; ?></td>
   	   </tr>
    	 <tr style="cursor:pointer">
    	   <td>&nbsp;</td>
    	   <td>&nbsp;</td>
  	   </tr>
    	<?php if($_SESSION['level'] == 'HQ'){ ?>  
            <tr style="cursor:pointer">
    
            <td><button class="btn info" onclick="loadEdit('<?php echo $_GET['id'];?>')">Edit</button></td>
    
            <td><button class="btn error" onclick="del('<?php echo $_GET['id'];?>')">Delete</button></td>
            </tr> 
		<?php } ?>
      </table>
