<?php
	
	include_once("includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	
	$rs = $dbManager->getCustomQuery("show tables");
	
	for($x = 0; $x < count($rs); $x++){
		$table =  $rs[$x]['Tables_in_cid_gweru'];
		echo "Creating file for ".$table.". And writing code. <br>";
		
		$f = fopen ("scripts/get_".$table.".php", "w+");
		
		$data = "<?php \n\t";
		$data .= 'include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");';
		$data.= "\n\t";
		$data.= '$dbManager = new DatabaseManager();';
		$data.= "\n\t";
		
		$data.= 'if(!empty($_REQUEST["id"]))';
		$data.= "\n\t\t";
		
		$data.= '$rs = $dbManager->getCustomQuery("select * from '.$table.' where id = ".$_REQUEST["id"]);';
		$data.= "\n\t";
		
		$data.= 'else';
		$data.= "\n\t\t";
		
		$data.= '$rs = $dbManager->getCustomQuery("select * from '.$table.' ");';
		$data.= "\n\n\t";
		
		$data.= ' ?> <table border = 0 width = "90%">';
		$data.= "\n\n\t";
		$data.= '<tr> ';
		$rs1 = $dbManager->getCustomQuery("desc ".$table);		
		for($y  = 0; $y < count($rs1); $y++){
			
			$field = $rs1[$y]['Field'];
			$data.= '<td>'.$field.'</td>';
			
		}		
		$data.= '</tr> <?php';
		
		$data.= "\n\t";
		$data.= 'for($x = 0 ; $x < count($rs); $x++){';
		$data.= "\n\t\t";
		$data.= " ?> <tr>";	
		$data.= "\n\n\t\t";	
		$rs1 = $dbManager->getCustomQuery("desc ".$table);		
		for($y  = 0; $y < count($rs1); $y++){
			
			$field = $rs1[$y]['Field'];
			$data.= '<td><?php echo $rs[$x]["'.$field.'"]; ?></td>';
			$data.= "\n\n\t\t";
			
		}				
		$data.= "</tr> <?php ";
		$data.= "\n\n\t";
		$data.= '}';
		$data.= "\n\n\t";
		$data.= '?> </table>';
		fwrite($f, $data);
		echo "Code dumbing done.<hr>";
	}
	

 
?>