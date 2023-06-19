<?php
session_start();
session_destroy();

if (isset($_POST['save']))
	{	   
	include 'db.php';
	
			 		$firstname=$_POST['firstname'] ;
					$lastname= $_POST['lastname'] ;				
					$idno=$_POST['idno'] ;
				
					$county=$_POST['county'] ;
					$location=$_POST['location'] ;
					$mobile=$_POST['mobile'] ;
					$address=$_POST['address'] ;
					$email=$_POST['email'] ;
					$landmark=$_POST['lmark'] ;
					$centre=$_POST['centre'] ;
					$gender=$_POST['gender'] ;
					$bdate=$_POST['bdate'] ;
					
					$occupation=$_POST['occupation'] ;
					
										
					
					$username=$_POST['username'] ;
					$password=$_POST['password'] ;
												
		 mysql_query("INSERT INTO farmer (firstname,lastname,idno,county,location,mobile,address,lmark,centre,gender,bdate,occupation,username,password) 
	VALUES ('$firstname','$lastname','$idno','$county','$location','$mobile','$address','$email','$landmark','$centre','$gender','$bdate','$occupation','$username','$password')"); 
									
									 
					echo "Your file has been saved in the database..";
								
											
											echo"One Record Successfully Added!";
											
			
	}
											
				
				
				
				
				
	       
?>