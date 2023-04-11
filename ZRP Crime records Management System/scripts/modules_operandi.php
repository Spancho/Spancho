<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	
	if(isset($_GET['del'])){
		$dbManager->doQuery("delete from modules_operandi where id = ".$_GET['del']);
		$dbManager->redirect("index.php?page=get_modules_operandi.php");
	}
	
	$rs = $dbManager->getCustomQuery("select modules_operandi.* , person.full_names, person.national_id from modules_operandi , person where modules_operandi.person_id = person.id and modules_operandi.id = ".$_GET['id']);
	
	$x = 0;
	 ?> 
     <script language="javascript">
	 	function loadEdit(id){
			location = 'index.php?page=save_modules_operandi.php&id='+id;
		}

		function del(id){
			if(confirm('Are you sure you want to delete this record?')){
				location = 'index.php?page=modules_operandi.php&del='+id;
			}
		}
		
	 </script>
     
     <h3>Modules Operandi</h3>
     <hr />
     <table class="zebra-striped" width = "90%">
	<tr style="cursor:pointer">
	  <td width="34%"><strong>Full names</strong></td>
	  <td width="66%"><?php echo $rs[$x]["full_names"]; ?></td>
	  </tr>
	<tr style="cursor:pointer">
	  <td><strong>ID Number</strong></td>
	  <td><?php  if(strlen($rs[$x]["national_id"]) > 10) echo $rs[$x]["national_id"]; ?></td>
	  </tr>
	<tr style="cursor:pointer">
	  <td><strong>Offence</strong></td>
	  <td><?php echo $rs[$x]["offence"]; ?></td>
	  </tr>
	<tr style="cursor:pointer">
	  <td><strong>MO</strong></td>
	  <td><?php echo $rs[$x]["mo"]; ?></td>
	  </tr>
	<tr style="cursor:pointer">
	  <td><strong>Area</strong></td>
	  <td><?php echo $rs[$x]["area"]; ?></td>
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
