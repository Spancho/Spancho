<?php

	class GlobalFuncs{

		//takes table name and an array of fields and returns an insert statement
		function buildQueryStringForSaveNewRecord($table, $saveArray){
			
			if(empty($table) || empty($saveArray)){				
				return null;
			}
		
			$sql = "INSERT INTO ".$table. "(";
			$i = 0;
			foreach($saveArray as $key => $value){
				$sql.= $key;
				if(($i + 1) != count($saveArray)){
					$sql.=" ,";
				}
				$i++;				
			}
			
			$sql.=" ) VALUES ("; 
			$i = 0;
			foreach($saveArray as $key => $value){
				$sql.= "'".$value."'";
				if(($i + 1) != count($saveArray)){
					$sql.=" ,";
				}
				$i++;				
			}
			
			$sql .= ")";
			return $sql;
		}
		
		
		//returns an update statement
		function buildQueryStringForUpdateRecord($table, $saveArray, $id){
		
			if(empty($table) || empty($saveArray)){				
				return null;
			}
			
			$tableId = "id";
			if($id == null && $saveArray[$tableId] != null){
				$id = $saveArray[$tableId];
			}
			
			$sql = "UPDATE ".$table. " SET ";
			$i = 0;
			foreach($saveArray as $key => $value){
				$sql.= $key." = '".$value."'";
				if(($i + 1) != count($saveArray)){
					$sql.=" ,";
				}
				$i++;				
			}			
			
			$sql.= " WHERE $tableId = $id";

			return $sql;
		}
		
		//returns an update statement 
		//takes table name, save data id and tableId
		function customBuildQueryStringForUpdateRecord($table, $saveArray, $tableId, $id){
		
			if(empty($table) || empty($saveArray)){				
				return null;
			}
			
			if($id == null && $saveArray[$tableId] != null){
				$id = $saveArray[$tableId];
			}
			
			$sql = "UPDATE ".$table. " SET ";
			$i = 0;
			foreach($saveArray as $key => $value){
				$sql.= $key." = '".$value."'";
				if(($i + 1) != count($saveArray)){
					$sql.=" ,";
				}
				$i++;				
			}			
			
			$sql.= " WHERE $tableId = $id";

			return $sql;
		}

		
	/**
  	 * This method takes a String formatted as associated and builds it into an associated array based on delimiters
  	 *
  	 * @param String $string String to parse
  	 * @param String $fieldDelimiter - field delimiter, used to delimit one field from another: default '<|*f^|>'
 	 * @param String $valueDelimiter - value delimiter, used to delimit values (key from value) within a field: default '<|*v^|>' 
  	 * @return Array value of $string or null if $string is empty or null
  	 */
  	function buildAssocArrayFromAssocString($string, $fieldDelimiter = "<|*f^|>", $valueDelimiter = "<|*v^|>"){
  		if ($string == null || $string == ""){
  			return null;
  		}
  		$assocArray = array();
  		$topArray = explode( $fieldDelimiter , $string );
  		for ($i = 0; $i < sizeof($topArray); $i++) {
  			$inArray = explode( $valueDelimiter, $topArray[$i] );
  			$assocArray[$inArray[0]] = $inArray[1];
  		}
  		//run loop and build array from this
  		return $assocArray;
  	}

		/**
  	 * This method takes an array and breaks it down to a string that can be passed to JavaScript and parsed back into an array <br>
  	 * String will look like: "{'fieldName': 'fieldValue','fieldName': 'fieldValue',etc.}" (Note: no longer does this) <br><br>
  	 * 
  	 * Now, the string will be based on delimiters
  	 *
  	 * 
  	 * @param Array $assocArray the array to break down
  	 * @param String $fieldDelimiter - field delimiter, used to delimit one field from another: default '<|*f^|>'
 	 * @param String $valueDelimiter - value delimiter, used to delimit values (key from value) within a field: default '<|*v^|>'
  	 * @return String representation of $assocArray
  	 */ 
	 
  	function buildAssocStringFromArray($assocArray, $fieldDelimiter = "<|*f^|>", $valueDelimiter = "<|*v^|>"){
  		$currentArray = $assocArray;
  		$arrayString = "";
  		$arrayKeys = array_keys($assocArray);
  		
  		//eval('(' +"{'MSRP': 20000,'cashDown': 2000,'tradeIn': 1000}" + ')'); //this is old
  		
  		$arrayLen = count($arrayKeys);
  		//$arrayString .= "{";
  		for($int=0; $int<$arrayLen; $int++) {
  			$fieldName = $arrayKeys[$int];
  			$fieldValue = $assocArray[$fieldName];
  			//if (empty($fieldValue)){
  			//	$fieldValue = "100";
  			//}
  			if ($int == 0){
  				//$arrayString .= "'" . $fieldName . "': '" . $fieldValue . "'";
  				$arrayString .= $fieldName . $valueDelimiter . $fieldValue;
  			} else {
  				//$arrayString .= "," . "'" . $fieldName . "': '" . $fieldValue . "'";
  				$arrayString .= $fieldDelimiter . $fieldName . $valueDelimiter . $fieldValue;
  			}
  		}
  		//$arrayString .= "}";
  		
  		return $arrayString;
  	}


}

?>