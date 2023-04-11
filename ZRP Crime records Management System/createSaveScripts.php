<?php
	
	include_once("includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	
	$rs = $dbManager->getCustomQuery("show tables");
	
	for($x = 0; $x < count($rs); $x++){
		$table =  $rs[$x]['Tables_in_cid_gweru'];
		echo "Creating file for ".$table.". And writing code. <br>";
		
		$f = fopen ("scripts/save_".$table.".php", "w+");
		
		$data = "<?php \n\t";
		$data .= 'include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");';
		$data.= "\n\t";
		$data.= '$dbManager = new DatabaseManager();';
		$data.= "\n\t ?> \n\t";
		$data.= ' <form name = "frm1" method = "post"><table border = "0">';
		$data.= "\n\t";
		
		$rs1 = $dbManager->getCustomQuery("desc ".$table);

		//echo form		
		for($y  = 0; $y < count($rs1); $y++){
			
			$field = $rs1[$y]['Field'];
			if($field == "id")
				;
			else{
				$data.= '<tr><td>'.$field.'</td><td><input type = "text" name = "'.$field.'" /></td></tr>';
				$data.= "\n\t";
			}
		}
		
		$data.= "\n\t";
		$data.= '<tr><td colspan = "2"><input type = "submit" value = "Save" name = "save"/></td>';
		$data.= "\n\t";
		
		$data.= '</table></form>';
		$data.= "\n\t";
		$data.= '<?php ';
		$data.= "\n\t";
		$data.= 'if(isset($_POST["save"])){';		
		$data.= "\n\t\t";
		for($y  = 0; $y < count($rs1); $y++){
			
			$field = $rs1[$y]['Field'];
			if($field == "id")
				;
			else{
				$data.= '$saveArray["'.$field.'"] = $_REQUEST["'.$field.'"];';	
				$data.= "\n\t\t";
			}
		}
		
		//echo php save script

		$data.= "\n\t";
		$data.= 'if(empty($_REQUEST["id"]) || $_REQUEST["id"] == 0)';		
		
		$data.= "\n\t\t";
		$data.= '$dbManager->saveSingleRecord("'.$table.'", $saveArray);';
		$data.= "\n\t";
		
		$data.= 'else';
		$data.= "\n\t\t";
		
		$data.= '$dbManager->updateSingleRecord("'.$table.'", $saveArray, $_REQUEST["id"]);';
		
		$data.= "\n\t";
		$data.= '}';
		$data.= "\n\t";
		$data.= ' ?>';
		fwrite($f, $data);
		echo "Code dumbing done.<hr>";
	}
	

 
?>