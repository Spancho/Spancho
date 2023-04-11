<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	
	if(isset($_POST['search']))
		$rs = $dbManager->getCustomQuery("select recent_releases.* , person.full_names, person.national_id from recent_releases , person where recent_releases.person_id = person.id and person.full_names like '%".$_POST['full_names']."%'");
	else
		$rs = $dbManager->getCustomQuery("select recent_releases.* , person.full_names, person.national_id from recent_releases , person where recent_releases.person_id = person.id order by recent_releases.id desc limit 20");

	 ?> 
	<script language="javascript">
        function loadDetails(id){
            location = 'index.php?page=recent_releases.php&id='+id;
        }
    </script>
     
     <h3>Search Recent Releases</h3>
     [ <a href="scripts/print_recent_releases.php" target="_blank">Print</a> ]
<hr />
     <form action="" method="post" name="form1" id="form1">
       <strong>       Full names 
       <input type="text" name="full_names" id="full_names" value="<?php echo $_POST['full_names'];?>" />     
       </strong>
       <input type="submit" name="search" id="search" value=" Search " class="btn success" />
     </form>
     
     <table  width = "90%" class="zebra-striped">

	<tr > 
	  <th>Full names </th>
	  <th>ID # </th>
	  <th>Prison #</th>
	  <th>Offence</th>
	  <th>CBR #</th>
	  <th>EDR</th>
	  <th>Forwarding Address</th>
	</tr> <?php
	for($x = 0 ; $x < count($rs); $x++){
		 ?>
         <tr style="cursor:pointer" onclick="loadDetails('<?php echo $rs[$x]["id"]; ?>')">

            <td><?php echo $rs[$x]["full_names"]; ?></td>
    
            <td><?php if(strlen($rs[$x]["national_id"]) > 10) echo $rs[$x]["national_id"]; ?></td>
    
            <td><?php echo $rs[$x]["prison_number"]; ?></td>
    
            <td><?php echo $rs[$x]["offence"]; ?></td>
    
            <td><?php echo $rs[$x]["cbr_number"]; ?></td>
    
            <td><?php echo $rs[$x]["edr"]; ?></td>
    
            <td><?php echo $rs[$x]["forwarding_address"]; ?></td>
    
		</tr> <?php 

	}

	?> </table>