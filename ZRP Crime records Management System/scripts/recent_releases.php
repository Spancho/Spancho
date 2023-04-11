<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	
	if(isset($_GET['del'])){
		$dbManager->doQuery("delete from recent_releases where id = ".$_GET['del']);
		$dbManager->redirect("index.php?page=get_recent_releases.php");
	}
	
	$rs = $dbManager->getCustomQuery("select recent_releases.* , person.full_names, person.national_id from recent_releases , person where recent_releases.person_id = person.id and recent_releases.id = ".$_GET['id']);
	
	$x = 0;
	 ?> 
     <script language="javascript">
	 	function loadEdit(id){
			location = 'index.php?page=save_recent_releases.php&id='+id;
		}
		
		function del(id){
			if(confirm('Are you sure you want to delete this record?')){
				location = 'index.php?page=recent_releases.php&del='+id;
			}
		}
		
	 </script>
     
     <h3>Recent Releases</h3>
     <hr />
     
     <table  width = "90%" class="zebra-striped">

	<tr style="cursor:pointer">
	  <td width="31%"><strong>Full names</strong></td>
	  <td width="69%"><?php echo $rs[$x]["full_names"]; ?></td>
	  </tr>
	<tr style="cursor:pointer">
	  <td><strong>ID # </strong></td>
	  <td><?php echo $rs[$x]["national_id"]; ?></td>
	  </tr>
	<tr style="cursor:pointer">
	  <td><strong>Prison #</strong></td>
	  <td><?php echo $rs[$x]["prison_number"]; ?></td>
	  </tr>
	<tr style="cursor:pointer">
	  <td><strong>Offence</strong></td>
	  <td><?php echo $rs[$x]["offence"]; ?></td>
	  </tr>
	<tr style="cursor:pointer">
	  <td><strong>CBR #</strong></td>
	  <td><?php echo $rs[$x]["cbr_number"]; ?></td>
	  </tr>
	<tr style="cursor:pointer">
	  <td><strong>EDR</strong></td>
	  <td><?php echo $rs[$x]["edr"]; ?></td>
	  </tr>
	<tr style="cursor:pointer">
	  <td><strong>Forwarding Address</strong></td>
	  <td><?php echo $rs[$x]["forwarding_address"]; ?></td>
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
