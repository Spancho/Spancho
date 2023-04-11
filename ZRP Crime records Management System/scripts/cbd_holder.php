<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	
	if(isset($_GET['del'])){
		$dbManager->doQuery("delete from cbd_holder where id = ".$_GET['del']);
		$dbManager->redirect("index.php?page=get_cbd_holder.php");
	}

	$rs = $dbManager->getCustomQuery("select cbd_holder.*  , person.full_names, person.national_id from cbd_holder, person where cbd_holder.person_id = person.id and cbd_holder.id = ".$_GET['id']);
	
	$x = 0;
	 ?> 
     <script language="javascript">
	 	function loadEdit(id){
			location = 'index.php?page=save_cbd_holder.php&id='+id;
		}
		
		function del(id){
			if(confirm('Are you sure you want to delete this record?')){
				location = 'index.php?page=cbd_holder.php&del='+id;
			}
		}
	 </script>
     
     <h3>CBD Holder</h3>
     <hr />

<table class="zebra-striped" width = "90%">

    	 <tr style="cursor:pointer">
    	   <td width="29%"><strong>Full names</strong></td>
    	   <td width="71%"><?php echo $rs[$x]["full_names"]; ?></td>
   	   </tr>
    	 <tr style="cursor:pointer">
    	   <td><strong>ID Number</strong></td>
    	   <td><?php if(strlen($rs[$x]["national_id"]) > 10) echo $rs[$x]["national_id"]; ?></td>
   	   </tr>
    	 <tr style="cursor:pointer">
    	   <td><strong>Court</strong></td>
    	   <td><?php echo $rs[$x]["court"]; ?></td>
   	   </tr>
    	 <tr style="cursor:pointer">
    	   <td><strong>Place of trial</strong></td>
    	   <td><?php echo $rs[$x]["place_of_trial"]; ?></td>
   	   </tr>
    	 <tr style="cursor:pointer">
    	   <td><strong>Trail date</strong></td>
    	   <td><?php if(strlen($rs[$x]["trial_date"]) > 7) echo date("d/M/y",$rs[$x]["trial_date"]); ?></td>
   	   </tr>
    	 <tr style="cursor:pointer">
    	   <td><strong>Sentence</strong></td>
    	   <td><?php echo $rs[$x]["sentence"]; ?></td>
   	   </tr>
    	 <tr style="cursor:pointer">
    	   <td><strong>Offence</strong></td>
    	   <td><?php echo $rs[$x]["offence"]; ?></td>
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
