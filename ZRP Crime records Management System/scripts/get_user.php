<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	
	if(isset($_GET['del']))
		$dbManager->doQuery("delete from user where id = ".$_GET['del']);
		
	$rs = $dbManager->getCustomQuery("select * from user ");

	 ?> 
     <table class="zebra-striped" width = "90%">

	<tr> 
        <th>Full name</th>
        <th>Username</th>
        <th>Level</th>
	    <th>&nbsp;</th>
	</tr> <?php
	for($x = 0 ; $x < count($rs); $x++){
		 ?> <tr>

		<td><?php echo $rs[$x]["full_name"]; ?></td>

		<td><?php echo $rs[$x]["username"]; ?></td>

		<td><?php echo $rs[$x]["level"]; ?></td>

		<td>
        	<?php if($_SESSION['user_id'] != $rs[$x]["id"]){ ?>
	            [ <a href="index.php?page=get_user.php&del=<?php echo $rs[$x]["id"];?>" onclick="return confirm('Are you sure?');">Delete</a> ]
            <?php } ?>
         </td>
	</tr> <?php 

	}

	?> </table>
