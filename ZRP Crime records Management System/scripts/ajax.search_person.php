<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
	
	$id = $_REQUEST['id1']."-".$_REQUEST['id2']."-".$_REQUEST['id3']."-".$_REQUEST['id4'];
	$sql = "select * from person where national_id like '".$id."'";
	$rs_person = $dbManager->getCustomQuery($sql);
	echo $rs_person[0]['full_names'];
 ?> 
