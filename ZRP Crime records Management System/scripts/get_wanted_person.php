<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();

	if(isset($_POST['search']))
		$rs = $dbManager->getCustomQuery("select wanted_person.*, person.full_names, person.national_id from wanted_person , person where wanted_person.person_id = person.id and person.full_names like '%".$_POST['full_names']."%'");
	else	
		$rs = $dbManager->getCustomQuery("select wanted_person.*, person.full_names, person.national_id from wanted_person , person where wanted_person.person_id = person.id order by  wanted_person.id desc limit 20");

	 ?> 
	<script language="javascript">
        function loadDetails(id){
            location = 'index.php?page=wanted_person.php&id='+id;
        }
    </script>
     <h3>Search Wanted Persons</h3>
     [ <a href="scripts/print_wanted_person.php" target="_blank">Print</a> ]
<hr />
     <form action="" method="post" name="form1" id="form1">
       <strong>       Full names 
       <input type="text" name="full_names" id="full_names" value="<?php echo $_POST['full_names'];?>" />     
       </strong>
       <input type="submit" name="search" id="search" value=" Search " class="btn success" />
     </form>

     <table width = "90%" class="zebra-striped">

	<tr > 
	  <th>Full names </th>
	  <th>ID Number </th>
	  <th>Station</th>
	  <th>CR Number</th>
	  <th>Offence</th>
	</tr> <?php
	for($x = 0 ; $x < count($rs); $x++){
		 ?> 
         <tr style="cursor:pointer" onclick="loadDetails('<?php echo $rs[$x]["id"]; ?>')">

            <td><?php echo $rs[$x]["full_names"]; ?></td>
    
            <td><?php if(strlen($rs[$x]["national_id"]) > 10) echo $rs[$x]["national_id"]; ?></td>
    
            <td><?php echo $rs[$x]["station"]; ?></td>
    
            <td><?php echo $rs[$x]["cr_number"]; ?></td>
    
            <td><?php echo $rs[$x]["offence"]; ?></td>

		</tr> <?php 

	}

	?> </table>