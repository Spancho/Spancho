<?php
	require_once(dirname(__FILE__)."/../dbFuncs.php");
	require_once(dirname(__FILE__)."/../globalFuncs.php");
	
	class DatabaseManager{
	
		var $globalFuncs = null;
	
		//constructor - creates instances of objects i will require
		function __construct(){
			$this->globalFuncs = new GlobalFuncs();
		}
	
		function getSingleTableSingleRecordAllById($table, $id){
			
			if(empty($table)){
				return null;
			}
			
			$db = getConnection();
			$keyField = $table."_id";	
			
			$sql = "SELECT * FROM $table WHERE $keyField = '$id'";
			$result = mysql_query($sql);
			return mysql_fetch_assoc($result);
		
		}
		
		function getSingleTableSingleRecordAllByCriteria($table, $query){
			
			if(empty($table) || empty($query)){
				return null;
			}
			
			$db = getConnection();
						
			$sql = "SELECT * FROM $table WHERE $query";
			
			$result = mysql_query($sql);			
			
			while($row = mysql_fetch_assoc($result)){
				$rows[$cnt] = $row; 
				$cnt++;
			}
			return $rows;
		}
		
		function getCustomQuery($sql){
		
			if(empty($sql)){
				return null;
			}
			
			$db = getConnection();
			$result = mysql_query($sql) or (die(mysql_error()));			
			$rows = null;
			$cnt = 0;
			if($result){
				while($row = mysql_fetch_assoc($result)){
					$rows[$cnt] = $row; 
					$cnt++;
				}
		
			}
			return $rows;
		}
		
		function doQuery($sql){
			$db = getConnection();
			mysql_query($sql);
		}

		function getCustomQuerySingleRecord($sql){
		
			if(empty($sql)){
				return null;
			}
			
			$db = getConnection();
						
			$result = mysql_query($sql);			
			
			return mysql_fetch_assoc($result);
		}
		
		function getSingleTableSingleRecordFieldsById($table, $fields, $id){
			
			if(empty($table)){
				return null;
			}
			
			$keyField = $table."_id";	
			$db = getConnection();
			$strFields = "";
			
			for($i = 0; $i < count($fields); $i++){				
					$strFields.= $fields[$i];
					if(($i + 1) != count($fields)){
						$strFields.=" ,";
					}
			}
			
			if($strFields == ""){
				$strFields = "*";
			}
						
			$sql = "SELECT $strFields FROM $table WHERE $keyField = $id";
			$result = mysql_query($sql);
			return mysql_fetch_assoc($result);
		}
		
		function getSingleTableSingleRecordFieldsByCriteria($table, $fields, $query){
		
			if(empty($table)){
				return null;
			}
			
			$db = getConnection();
			$strFields = "";
			for($i = 0; $i < count($fields); $i++){				
					$strFields.= $fields[$i];
					if(($i + 1) != count($fields)){
						$strFields.=" ,";
					}
			}
			
			if($strFields == ""){
				$strFields = "*";
			}
			
			$sql = "SELECT $strFields FROM $table WHERE $query";
			
			$result = mysql_query($sql);
			return mysql_fetch_assoc($result);
		}
		
		function saveSingleRecord($table, $saveArray){
			$db = getConnection();
			$sql = $this->globalFuncs->buildQueryStringForSaveNewRecord($table, $saveArray);
			//echo $sql;
			mysql_query($sql) or die(mysql_error());
			
			return mysql_insert_id();
		}
		
		function updateSingleRecord($table, $saveArray, $id){
			$db = getConnection();
			$sql = $this->globalFuncs->buildQueryStringForUpdateRecord($table, $saveArray, $id);
			//echo $sql;
			mysql_query($sql) or die(mysql_error());
		}
		
		//same as above but takes primary table field		
		function customUpdateSingleRecord($table, $saveArray, $tableId, $id){
			$db = getConnection();
			$sql = $this->globalFuncs->customBuildQueryStringForUpdateRecord($table, $saveArray, $tableId, $id);
			//echo $sql;
			mysql_query($sql) or die(mysql_error());
		}

		
		function deleteRecords($table, $field, $value){
			$db = getConnection();
			$sql = "DELETE FROM $table WHERE $field = '$value'";
			//echo $sql;
			mysql_query($sql)or die (mysql_error());
			
		}
		
		function getSpecificField($sql, $field){
				
			$db = getConnection();
						
			$result = mysql_query($sql);			
			$row = mysql_fetch_assoc($result);

			return $row[$field];
		}
		
		
		function auditLog($action){
		
			$saveArray['action'] = $action;
			$saveArray['date_'] = time();
			$this->saveSingleRecord("auditlog", $saveArray);
		}
		
		//this one is inapropriately placed, forgive me
		//it's supposed to be a utility
		function msg($msg){
			?>
				<script language="javascript">
					alert('<?php echo $msg;?>');
				</script>
			<?php
		}
		//and so is this one
		function redirect($link){
			?>
				<script language="javascript">
					location = '<?php echo $link;?>';
				</script>
			<?php
		}
		
		function getAvailableSeats($flight){
			
			
		}
		
	}
?>