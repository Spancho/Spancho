<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();

	$rs = $dbManager->getCustomQuery("select wanted_person.*, person.full_names, person.national_id from wanted_person , person where wanted_person.person_id = person.id order by  wanted_person.id desc ");

	 ?> 
<script language="javascript">
		function printPage() { print(document); }
    </script>
     <h3>Search Wanted Persons</h3>
     <hr />

     <table width = "90%" cellpadding="1" cellspacing="1" bgcolor="#000000" >

	<tr > 
	  <th bgcolor="#FFFFFF">Full names </th>
	  <th bgcolor="#FFFFFF">ID Number </th>
	  <th bgcolor="#FFFFFF">Station</th>
	  <th bgcolor="#FFFFFF">CR Number</th>
	  <th bgcolor="#FFFFFF">Offence</th>
	</tr> <?php
	for($x = 0 ; $x < count($rs); $x++){
		 ?> 
         <tr >

            <td bgcolor="#FFFFFF"><?php echo $rs[$x]["full_names"]; ?></td>
    
           <td bgcolor="#FFFFFF"><?php echo $rs[$x]["national_id"]; ?></td>
    
           <td bgcolor="#FFFFFF"><?php echo $rs[$x]["station"]; ?></td>
    
           <td bgcolor="#FFFFFF"><?php echo $rs[$x]["cr_number"]; ?></td>
    
           <td bgcolor="#FFFFFF"><?php echo $rs[$x]["offence"]; ?></td>

	   </tr> <?php 

	}

	?> </table>
<p><button onclick="printPage()"> Print </button></p>            