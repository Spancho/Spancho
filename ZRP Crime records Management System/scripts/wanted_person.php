<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	
	if(isset($_GET['del'])){
		$dbManager->doQuery("delete from wanted_person where id = ".$_GET['del']);
		$dbManager->redirect("index.php?page=get_wanted_person.php");
	}
	
	$rs = $dbManager->getCustomQuery("select wanted_person.*, person.full_names, person.national_id from wanted_person , person where wanted_person.person_id = person.id and wanted_person.id = ".$_GET['id']);
	
	$x = 0;
?> 
     <script language="javascript">
	 	function loadEdit(id){
			location = 'index.php?page=save_wanted_person.php&id='+id;
		}

		function del(id){
			if(confirm('Are you sure you want to delete this record?')){
				location = 'index.php?page=wanted_person.php&del='+id;
			}
		}
		
	 </script>
     <h3>Wanted Person</h3>
     <hr />
     <table width = "90%" class="bordered-table">

         <tr style="cursor:pointer">
           <td width="29%"><strong>Full names</strong></td>
           <td width="71%"><?php echo $rs[$x]["full_names"]; ?></td>
         </tr>
         <tr style="cursor:pointer">
           <td><strong>ID Number</strong></td>
           <td><?php if(strlen($rs[$x]["national_id"]) > 10) echo $rs[$x]["national_id"]; ?></td>
         </tr>
         <tr style="cursor:pointer">
           <td><strong>Station</strong></td>
           <td><?php echo $rs[$x]["station"]; ?></td>
         </tr>
         <tr style="cursor:pointer">
           <td><strong>CR Number</strong></td>
           <td><?php echo $rs[$x]["cr_number"]; ?></td>
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
		<?php 	} ?>
	 </table>
