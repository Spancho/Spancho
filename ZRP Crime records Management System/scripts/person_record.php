<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
?>

<h3>Records for <?php echo $_GET['full_name'];?></h3>
<hr>
<?php
	$rs = $dbManager->getCustomQuery("select wanted_person.*, person.full_names, person.national_id from wanted_person , person where wanted_person.person_id = person.id and person.id = ".$_GET['id']);
	
	if(count($rs) > 0){ //if wanted records exist
		 ?> 
		<script language="javascript">
			function loadWantedDetails(id){
				location = 'index.php?page=wanted_person.php&id='+id;
			}
		</script>
		<h3>Wanted Person Records</h3>
		<hr />
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
			 <tr style="cursor:pointer" onclick="loadWantedDetails('<?php echo $rs[$x]["id"]; ?>')">
	
				<td><?php echo $rs[$x]["full_names"]; ?></td>
		
				<td><?php echo $rs[$x]["national_id"]; ?></td>
		
				<td><?php echo $rs[$x]["station"]; ?></td>
		
				<td><?php echo $rs[$x]["cr_number"]; ?></td>
		
				<td><?php echo $rs[$x]["offence"]; ?></td>
	
			</tr> <?php 
	
		}
	
		?> 
	   </table>   
    
    <?php 
	}//if wanted records exist
	
	$rs = $dbManager->getCustomQuery("select recent_releases.* , person.full_names, person.national_id from recent_releases , person where recent_releases.person_id = person.id and person.id = ".$_GET['id']);
	
	if(count($rs) > 0){ //if rr records exist
	 ?> 
		<script language="javascript">
            function loadRRDetails(id){
                location = 'index.php?page=recent_releases.php&id='+id;
            }
        </script>
         
         <h3>Recent Releases Records</h3>
        <hr />
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
             <tr style="cursor:pointer" onclick="loadRRDetails('<?php echo $rs[$x]["id"]; ?>')">
    
                <td><?php echo $rs[$x]["full_names"]; ?></td>
        
                <td><?php echo $rs[$x]["national_id"]; ?></td>
        
                <td><?php echo $rs[$x]["prison_number"]; ?></td>
        
                <td><?php echo $rs[$x]["offence"]; ?></td>
        
                <td><?php echo $rs[$x]["cbr_number"]; ?></td>
        
                <td><?php echo $rs[$x]["edr"]; ?></td>
        
                <td><?php echo $rs[$x]["forwarding_address"]; ?></td>
        
            </tr> <?php 
    
        }
    
        ?> </table>    
<?php 
	}//if RR records exist
	
	$rs = $dbManager->getCustomQuery("select cbd_holder.*  , person.full_names, person.national_id from cbd_holder, person where cbd_holder.person_id = person.id and person.id = ".$_GET['id']);
	
	if(count($rs) > 0){ //if CBD records exist
	 ?> 
		<script language="javascript">
            function loadCBDDetails(id){
                location = 'index.php?page=cbd_holder.php&id='+id;
            }
        </script>
    
         <h3>CBD Holders Records</h3>
        <hr />
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
             ?> <tr style="cursor:pointer" onclick="loadCBDDetails('<?php echo $rs[$x]["id"]; ?>')">
    
            <td><?php echo $rs[$x]["full_names"]; ?></td>
    
            <td><?php echo $rs[$x]["national_id"]; ?></td>
            <td><?php echo $rs[$x]["court"]; ?></td>
    
            <td><?php echo $rs[$x]["place_of_trial"]; ?></td>
    
            <td><?php if(strlen($rs[$x]["trial_date"]) > 7) echo date("d/M/y",$rs[$x]["trial_date"]); ?></td>
    
            <td><?php echo $rs[$x]["sentence"]; ?></td>
    
            <td><?php echo $rs[$x]["offence"]; ?></td>
    
            </tr> <?php 
    
        }
    
        ?> </table>
<?php 
	}//if CBD records exist
	$rs = $dbManager->getCustomQuery("select modules_operandi.* , person.full_names, person.national_id from modules_operandi , person where modules_operandi.person_id = person.id and person.id = ".$_GET['id']);
	
	if(count($rs) > 0){//if modules operandi records exist
		 ?> 
		<script language="javascript">
			function loadDetails(id){
				location = 'index.php?page=modules_operandi.php&id='+id;
			}
		</script>
		 
		 <h3>Search Modules Operandi</h3>
		<hr />
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
	
			<td><?php echo $rs[$x]["national_id"]; ?></td>
	
			<td><?php echo $rs[$x]["offence"]; ?></td>
	
			<td><?php echo $rs[$x]["mo"]; ?></td>
	
			<td><?php echo $rs[$x]["area"]; ?></td>
	
			</tr> <?php 
	
		}
	
		?> </table>
     <?php 
	 }//if modules operandi records exist
	?>