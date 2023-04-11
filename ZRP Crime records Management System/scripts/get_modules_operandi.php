<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	
	if(isset($_POST['search']))
		$rs = $dbManager->getCustomQuery("select modules_operandi.* , person.full_names, person.national_id from modules_operandi , person where modules_operandi.person_id = person.id and person.full_names like '%".$_POST['full_names']."%'");
	else
		$rs = $dbManager->getCustomQuery("select modules_operandi.* , person.full_names, person.national_id from modules_operandi , person where modules_operandi.person_id = person.id order by  modules_operandi.id desc limit 20");

	 ?> 
	<script language="javascript">
        function loadDetails(id){
            location = 'index.php?page=modules_operandi.php&id='+id;
        }
    </script>
     
     <h3>Search Modules Operandi</h3>
     [ <a href="scripts/print_modules_operandi.php" target="_blank">Print</a> ]
<hr />
     <form action="" method="post" name="form1" id="form1">
       <strong>       Full names 
       <input type="text" name="full_names" id="full_names" value="<?php echo $_POST['full_names'];?>" />     
       </strong>
       <input type="submit" name="search" id="search" value=" Search " class="btn success" />
     </form>

     <table class="zebra-striped" width = "90%">

	<tr > 
		<th>Full names </th>
	  <th>ID Number </th>
	  <th>Offence</th>
	  <th>MO</th>
	  <th>Area</th>
	</tr> <?php
	for($x = 0 ; $x < count($rs); $x++){
		 ?> <tr style="cursor:pointer" onclick="loadDetails('<?php echo $rs[$x]["id"]; ?>')">

		<td><?php echo $rs[$x]["full_names"]; ?></td>

		<td><?php if(strlen($rs[$x]["national_id"]) > 10) echo $rs[$x]["national_id"]; ?></td>

		<td><?php echo $rs[$x]["offence"]; ?></td>

		<td><?php echo $rs[$x]["mo"]; ?></td>

		<td><?php echo $rs[$x]["area"]; ?></td>

		</tr> <?php 

	}

	?> </table>