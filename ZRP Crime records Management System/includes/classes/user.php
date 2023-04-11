<?php

	include_once(dirname(__FILE__).'/../dbFuncs.php');
	

	class User{
	
		function loginUser($username, $password){
			$db = getConnection();

			$sql = "SELECT * from student where userName = '$username' and password = '$password'";
			$result = mysql_query($sql);
			$numRows = mysql_num_rows($result);

			if($numRows > 0){				
				$row = mysql_fetch_row($result); 
				$_SESSION['student'] = $row[0];
				$_SESSION['validUser'] = true;
				$_SESSION['member'] = "student";

				return true;
			}
						
			//admin
			$sql = "SELECT * from teacher where userName = '$username' and password = '$password'";
			$result = mysql_query($sql);
			$numRows = mysql_num_rows($result);
			
			if($numRows > 0){
				
				$row = mysql_fetch_row($result); 
				$_SESSION['admin'] = $row[0];				
				$_SESSION['validUser'] = true;
				$_SESSION['member'] = "admin";
				$_SESSION['level'] = $row[3];
				return true;
			
			}else{
				return false;	
			}

		}	
		
		function isUserLoggedIn(){
			if (isset($_SESSION['validUser']) && $_SESSION['validUser']){
				if (isset($_SESSION['member']))
					return true;
			}
			
			return false;
		}
	}

?>