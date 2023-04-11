<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	
	$rs = $dbManager->getCustomQuery("select modules_operandi.* , person.full_names, person.national_id from modules_operandi , person where modules_operandi.person_id = person.id order by  modules_operandi.id desc ");

	 ?> 
<script language="javascript">
		function printPage() { print(document); }
    </script>
     
     <h3>Modules Operandi</h3>
     <hr />

     <table width = "90%" cellpadding="1" cellspacing="1" bgcolor="#000000">

<tr > 
		<th bgcolor="#FFFFFF">Full names </th>
    <th bgcolor="#FFFFFF">ID Number </th>
    <th bgcolor="#FFFFFF">Offence</th>
    <th bgcolor="#FFFFFF">MO</th>
    <th bgcolor="#FFFFFF">Area</th>
	</tr> <?php
	for($x = 0 ; $x < count($rs); $x++){
		 ?> 
         <tr >

		<td bgcolor="#FFFFFF"><?php echo $rs[$x]["full_names"]; ?></td>

		<td bgcolor="#FFFFFF"><?php echo $rs[$x]["national_id"]; ?></td>

		<td bgcolor="#FFFFFF"><?php echo $rs[$x]["offence"]; ?></td>

		<td bgcolor="#FFFFFF"><?php echo $rs[$x]["mo"]; ?></td>

		<td bgcolor="#FFFFFF"><?php echo $rs[$x]["area"]; ?></td>

	   </tr> <?php 

	}

	?> </table>
<p><button onclick="printPage()"> Print </button></p>    