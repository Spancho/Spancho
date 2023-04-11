<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	
	$rs = $dbManager->getCustomQuery("select cbd_holder.*  , person.full_names, person.national_id from cbd_holder, person where cbd_holder.person_id = person.id order by cbd_holder.id desc");

	 ?> 
   	<script language="javascript">
		function printPage() { print(document); }
    </script>

     <h3>CBD Holders</h3>
     <hr />

<table width = "90%" cellpadding="1" cellspacing="1" bgcolor="#000000">

  <tr > 
	<th bgcolor="#FFFFFF">Full names </th>
	<th bgcolor="#FFFFFF">ID Number </th>
	<th bgcolor="#FFFFFF">Court</th>
	<th bgcolor="#FFFFFF">Place of trial </th>
	<th bgcolor="#FFFFFF">Trial date</th>
	<th bgcolor="#FFFFFF">Sentence</th>
	<th bgcolor="#FFFFFF">Offence</th>
  </tr> <?php
	for($x = 0 ; $x < count($rs); $x++){
		 ?> <tr>

		<td bgcolor="#FFFFFF"><?php echo $rs[$x]["full_names"]; ?></td>

	<td bgcolor="#FFFFFF"><?php echo $rs[$x]["national_id"]; ?></td>
	<td bgcolor="#FFFFFF"><?php echo $rs[$x]["court"]; ?></td>

	<td bgcolor="#FFFFFF"><?php echo $rs[$x]["place_of_trial"]; ?></td>

	<td bgcolor="#FFFFFF"><?php if(strlen($rs[$x]["trial_date"]) > 7) echo date("d/M/y",$rs[$x]["trial_date"]); ?></td>

	<td bgcolor="#FFFFFF"><?php echo $rs[$x]["sentence"]; ?></td>

	<td bgcolor="#FFFFFF"><?php echo $rs[$x]["offence"]; ?></td>

		</tr> <?php 

	}

	?> </table>
<p><button onclick="printPage()"> Print </button></p>
    