<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();

	if(isset($_POST['search']))
		$rs = $dbManager->getCustomQuery("select * from person where person.full_names like '%".$_POST['full_names']."%'");
	else
		$rs = $dbManager->getCustomQuery("select * from person order by id desc limit 20");

	 ?> 
	<script language="javascript">
        function loadDetails(id, full_name){
            location = 'index.php?page=person_record.php&id='+id+'&full_name='+full_name;
        }
    </script>
     
     <h3>Search Persons</h3>
	<hr />
     <form action="" method="post" name="form1" id="form1">
       <strong>       Full names 
       <input type="text" name="full_names" id="full_names" value="<?php echo $_POST['full_names'];?>" />     
       </strong>
       <input type="submit" name="search" id="search" value=" Search " class="btn success" />
     </form>
     
     <table class="zebra-striped" width = "90%">

	<tr > 
    	<th>National ID</th>
	  	<th>Full Names</th>
	  	<th>Residental Address</th>
	</tr> <?php
	for($x = 0 ; $x < count($rs); $x++){
		 ?> 
        <tr style="cursor:pointer" onclick="loadDetails('<?php echo $rs[$x]["id"]; ?>', '<?php echo $rs[$x]["full_names"]; ?>')">

		<td><?php echo $rs[$x]["national_id"]; ?></td>

		<td><?php echo $rs[$x]["full_names"]; ?></td>

		<td><?php echo $rs[$x]["residental_address"]; ?></td>

		</tr> <?php 

	}

	?> </table>
    