<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	
	if(isset($_POST['search']))
		$rs = $dbManager->getCustomQuery("select cbd_holder.*  , person.full_names, person.national_id from cbd_holder, person where cbd_holder.person_id = person.id and person.full_names like '%".$_POST['full_names']."%'");
	else
		$rs = $dbManager->getCustomQuery("select cbd_holder.*  , person.full_names, person.national_id from cbd_holder, person where cbd_holder.person_id = person.id order by cbd_holder.id desc limit 20");

	 ?> 
   	<script language="javascript">
        function loadDetails(id){
            location = 'index.php?page=cbd_holder.php&id='+id;
        }
    </script>

     <h3>Search CBD Holders</h3> [ <a href="scripts/print_cbd_holder.php" target="_blank">Print</a> ]
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
	<th>Court</th>
	<th>Place of trial </th>
	<th>Trial date</th>
	<th>Sentence</th>
	<th>Offence</th>
	</tr> <?php
	for($x = 0 ; $x < count($rs); $x++){
		 ?> <tr style="cursor:pointer" onclick="loadDetails('<?php echo $rs[$x]["id"]; ?>')">

		<td><?php echo $rs[$x]["full_names"]; ?></td>

		<td><?php if(strlen($rs[$x]["national_id"]) > 10) echo $rs[$x]["national_id"]; ?></td>
		<td><?php echo $rs[$x]["court"]; ?></td>

		<td><?php echo $rs[$x]["place_of_trial"]; ?></td>

		<td><?php if(strlen($rs[$x]["trial_date"]) > 7) echo date("d/M/y",$rs[$x]["trial_date"]); ?></td>

		<td><?php echo $rs[$x]["sentence"]; ?></td>

		<td><?php echo $rs[$x]["offence"]; ?></td>

		</tr> <?php 

	}

	?> </table>
