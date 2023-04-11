<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();

	$rs = $dbManager->getCustomQuery("select recent_releases.* , person.full_names, person.national_id from recent_releases , person where recent_releases.person_id = person.id order by recent_releases.id desc ");

	 ?> 
<script language="javascript">
		function printPage() { print(document); }
    </script>
     
     <h3>Recent Releases</h3>
     <hr />
     <table  width = "90%" cellpadding="1" cellspacing="1" bgcolor="#000000" >

	<tr > 
	  <th bgcolor="#FFFFFF">Full names </th>
	  <th bgcolor="#FFFFFF">ID # </th>
	  <th bgcolor="#FFFFFF">Prison #</th>
	  <th bgcolor="#FFFFFF">Offence</th>
	  <th bgcolor="#FFFFFF">CBR #</th>
	  <th bgcolor="#FFFFFF">EDR</th>
	  <th bgcolor="#FFFFFF">Forwarding Address</th>
	</tr> <?php
	for($x = 0 ; $x < count($rs); $x++){
		 ?>
         <tr >

            <td bgcolor="#FFFFFF"><?php echo $rs[$x]["full_names"]; ?></td>
    
           <td bgcolor="#FFFFFF"><?php echo $rs[$x]["national_id"]; ?></td>
    
           <td bgcolor="#FFFFFF"><?php echo $rs[$x]["prison_number"]; ?></td>
    
           <td bgcolor="#FFFFFF"><?php echo $rs[$x]["offence"]; ?></td>
    
           <td bgcolor="#FFFFFF"><?php echo $rs[$x]["cbr_number"]; ?></td>
    
           <td bgcolor="#FFFFFF"><?php echo $rs[$x]["edr"]; ?></td>
    
           <td bgcolor="#FFFFFF"><?php echo $rs[$x]["forwarding_address"]; ?></td>
    
	   </tr> <?php 

	}

	?> 
    </table>
<p><button onclick="printPage()"> Print </button></p>        