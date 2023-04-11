<?php 
	include_once(dirname(__FILE__)."/../includes/classes/databaseManager.php");
	$dbManager = new DatabaseManager();
?>
	<?php 
	if(isset($_POST["save"])){
		$id = $_REQUEST['id1']."-".$_REQUEST['id2']."-".$_REQUEST['id3']."-".$_REQUEST['id4'];
		$rs = $dbManager->getCustomQuery("select * from person where national_id like '".$id."'");
		
		//if(count($rs) == 0){
			$saveArray["national_id"] = $id;
			$saveArray["full_names"] = $_REQUEST["full_names"];
			
			$person_id = $dbManager->saveSingleRecord("person", $saveArray);
		/*}else{
			$saveArray["full_names"] = $_REQUEST["full_names"];			
			$dbManager->updateSingleRecord("person", $saveArray, $rs[0]['id']);
			$person_id = $rs[0]['id'];
		}*/
		
		$saveArray = null;		
		$saveArray["person_id"] = $person_id;
		$saveArray["offence"] = $_REQUEST["offence"];
		$saveArray["mo"] = $_REQUEST["mo"];
		$saveArray["area"] = $_REQUEST["area"];
		
		if(empty($_GET["id"]) || $_GET["id"] == 0)
			$dbManager->saveSingleRecord("modules_operandi", $saveArray);
		else
			$dbManager->updateSingleRecord("modules_operandi", $saveArray, $_GET["id"]);

		?>			
			<script language="javascript">
				$("#info").fadeIn();
				$("#info").html("Record successfully saved.");
				$("#info").fadeOut(3000);
				location = 'index.php?page=get_modules_operandi.php';
			</script>
		<?php
			
	}
	 ?>
     <?php	
	if(!empty($_GET['id']))
		$rs = $dbManager->getCustomQuery("select modules_operandi.* , person.full_names, person.national_id from modules_operandi , person where modules_operandi.person_id = person.id and modules_operandi.id = ".$_GET['id']);

	$rs = $rs[0];	
	$id = split("-", $rs['national_id']);
	
	$id1 = $id[0];
	$id2 = $id[1];
	$id3 = $id[2];
	$id4 = $id[3];
	
	 ?> 
	 <script language="javascript">
	 	function autoFill(){
			$.ajax({ url: "scripts/ajax.search_person.php?"+$("#frm1").serialize(),  cache: false, async: false}).done(function( html ) {
				$("#full_names").val(html);
				
			});
		}
	 </script>
	<script language="javascript">
		function validate(){
		
		/*	if($("#id1").val() == ''){
				$("#error").fadeIn();
				$("#error").html("Please enter the national ID.");
				$("#error").fadeOut(3000);
				return false;
			}
	
			if($("#id2").val() == ''){
				$("#error").fadeIn();
				$("#error").html("Please enter the national ID.");
				$("#error").fadeOut(3000);
				return false;
			}

			if($("#id4").val() == ''){
				$("#error").fadeIn();
				$("#error").html("Please enter the national ID.");
				$("#error").fadeOut(3000);
				return false;
			}*/

			if($("#full_names").val() == ''){
				$("#error").fadeIn();
				$("#error").html("Please enter the national ID.");
				$("#error").fadeOut(3000);
				return false;
			}
			
			return true;
		}
	</script>
	 
	 <form name = "frm1" method = "post" id="frm1" onsubmit="return validate()">
	 <table width="361" height="184" border = "0">
	
	<tr>
	  <td width="104">ID Number </td>
	  <td width="237">
		<input name="id1" type="text" id="id1" size="4" maxlength="2" class="span2" onblur="autoFill()" value="<?php echo $id1;?>" />
		-
		  <input name="id2" type="text" id="id2" size="15" maxlength="8" class="span3" onblur="autoFill()" value="<?php echo $id2;?>" />
		-
		<select name="id3" id="id3" class="span2"  onchange="autoFill()">
		  <option value="A" selected="selected">A</option>
		  <option value="B">B</option>
		  <option value="C">C</option>
		  <option value="D">D</option>
		  <option value="E">E</option>
		  <option value="F">F</option>
		  <option value="G">G</option>
		  <option value="H">H</option>
		  <option value="I">I</option>
		  <option value="J">J</option>
		  <option value="K">K</option>
		  <option value="L">L</option>
		  <option value="M">M</option>
		  <option value="N">N</option>
		  <option value="O">O</option>
		  <option value="P">P</option>
		  <option value="Q">Q</option>
		  <option value="R">R</option>
		  <option value="S">S</option>
		  <option value="T">T</option>
		  <option value="U">U</option>
		  <option value="V">V</option>
		  <option value="W">W</option>
		  <option value="X">X</option>
		  <option value="Y">Y</option>
		  <option value="Z">Z</option>
          <?php if(!empty($id3)) { ?> <option value="<?php echo $id3; ?>"><?php echo $id3; ?></option> <?php } ?>
		</select>
		-
		<input name="id4" type="text" id="id4" size="4" maxlength="2" class="span2" onblur="autoFill()" value="<?php echo $id4;?>"/></td>
	  </tr>
	<tr>
	  <td>Full names </td>
	  <td><input name = "full_names" type = "text" id="full_names" class="span9" value="<?php echo $rs['full_names'];?>"/></td>
	  </tr>
	<tr>
	  <td>Offence</td><td><input type = "text" name = "offence" class="span9" value="<?php echo $rs['offence'];?>"/></td></tr>
	<tr>
	  <td>MO</td><td><input type = "text" name = "mo" value="<?php echo $rs['mo'];?>"/></td></tr>
	<tr>
	  <td>Area</td><td><input type = "text" name = "area" value="<?php echo $rs['area'];?>"/></td></tr>
	
	<tr><td colspan = "2"><input type = "submit" value = "Save" name = "save" class="btn info"/></td></tr>
	</table>
	 </form>
