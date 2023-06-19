<?php
session_start();
if(!(isset($_SESSION['username']))){
header("location:login.php");
}
else{
mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db("car_hire") or die(mysql_error());
$username=$_SESSION['username'];
$sql=mysql_query("select * from registration where username='$username'");
$query=mysql_fetch_array($sql);
$userid=$query['id'];
//echo $userid;
?>

<?php
include('header.php');
?>
  
<?php
include('left_menu.php');
?> 

<?php
if(isset($_POST['submit']))
{
mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db("car_hire") or die(mysql_error());

$car_choice=$_POST['car_choice'];
$number_plate=$_POST['number_plate'];
$pick_town=$_POST['pick_town'];
$pick_date=$_POST['pick_date'];
$pick_time=$_POST['pick_time'];
$drop_town=$_POST['drop_town'];
$drop_date=$_POST['drop_date'];
$drop_time=$_POST['drop_time'];

mysql_query("INSERT INTO hiring_table SET car_choice='$car_choice',number_plate='$number_plate',user='$userid',pick_town='$pick_town',pick_date='$pick_date',
pick_time='$pick_time',drop_town='$drop_town',drop_date='$drop_date',drop_time='$drop_time'") or die(mysql_error());

$sta=1;

$me=mysql_query("UPDATE car_details SET status='$sta' where id='$number_plate'") or die(mysql_error());

if($me){
echo "STATUS UPDATED";
}
else{
echo "STATUS NOT UPDATED";
}
}
?>
<script>
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	function getContract(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('boxdiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>
</script>
<style type="text/css">
		#ff label{
			display:block;
			width:100px;
		}
	</style>


	<script type="text/javascript">
		$(function(){
			$('#ff').form({
				url:'<?=$_POST['PHP_SELF'];?>',
				onSubmit:function(){
					return $(this).form('validate');
				},
				success:function(data){
					$.messager.alert('Info', data, 'info');
				}
			});
		});
	</script>


<?php
//start date
?>
 <link rel="stylesheet" href="css/jquery-ui.css">

<script type="text/javascript" language="JavaScript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>

<script>
$(function() {
$( "#selectable" ).selectable();
});


$(function() {
$( "#datepicker" ).datepicker({
changeMonth: true,
changeYear: true,
dateFormat: 'yy-mm-dd'
});
});
$(function() {
$( "#datepickers" ).datepicker({
changeMonth: true,
changeYear: true,
dateFormat: 'yy-mm-dd'
});
});

</script>

<?php
//end date
?>

<p>HIRING FORM <hr color="#993300" size="1%" />
<form name="form1" method="post" action="<?=$_SERVER['PHP_SELF']?>" class="formular" id="formID">
  <table width="81%">
    <tr>
      <td width="6%">&nbsp;</td>
      <td width="21%">Choose car </td>
      <td width="19%" valign="top"><select name="car_choice" id="car_choice" onChange="getContract('hiring.php?car_choice='+this.value)" class="validate[required]">
        <option value="">-Select Car-</option>
        <?php
 mysql_connect('localhost','root','') or die(mysql_error()) ; 
 mysql_select_db("car_hire") or die(mysql_error()) ; 
 	$sql=mysql_query("select * from car_models");
	while($fetch=mysql_fetch_array($sql)){
	$id=$fetch['model_id'];  
	$model=$fetch['model'];
	
	?>
        <option value="<?=$id;?>">  <?=$model;?> </option>
        <?php
	}?>
      </select></td>
    <td width="54%" >
	<div id="boxdiv"><select name="number_plate">
	<option value="">-Number Plate-</option>
      </select></div></td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td height="23">Pick Up  Town</td>
      <td>Date</td>
      <td>Time</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <select id="textbox" name="pick_town">
		<option value=""  selected="selected">--Pick Town--</option>
		<option value="Nairobi">Nairobi</option>
		<option value="Nakuru">Nakuru</option>
		<option value="Eldoret">Eldoret</option>
		<option value="Nanyuki">Nanyuki</option>
		<option value="Kisumu">Kisumu</option>
		<option value="Naivasha">Naivasha</option>
		<option value="Mombasa">Mombasa</option>
		<option value="Kitale">Kitale</option>
		<option value="Kakamega">Kakamega</option>
		</select>
      </label></td>
      <td><label>
	  <input value="" type="text" name="pick_date" id="datepicker" size="25" />
       
      </label></td>
      <td><label>	  
        <select id="select" name="pick_time">
          <option value=""  selected="selected">--Pick Time--</option>
          <option value="01:00">01:00</option>
          <option value="02:00">02:00</option>
		  <option value="03:00">03:00</option>
          <option value="04:00">04:00</option>
          <option value="05:00">05:00</option>
          <option value="06:00">06:00</option>
          <option value="07:00">07:00</option>
          <option value="08:00">08:00</option>
          <option value="09:00">09:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
		  <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
		  <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
        </select>
			
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Drop Off Town </td>
      <td>Date</td>
      <td>Time</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <select id="textbox" name="drop_town">
		<option value=""  selected="selected">--Drop Town--</option>
		<option value="Nairobi">Nairobi</option>
		<option value="Nakuru">Nakuru</option>
		<option value="Eldoret">Eldoret</option>
		<option value="Nanyuki">Nanyuki</option>
		<option value="Kisumu">Kisumu</option>
		<option value="Naivasha">Naivasha</option>
		<option value="Mombasa">Mombasa</option>
		<option value="Kitale">Kitale</option>
		<option value="Kakamega">Kakamega</option>
		</select>
      </label></td>
      <td><label>
	  <input value="" type="text" name="drop_date" id="datepickers" size="25" />
      </label></td>
      <td><label>
      <select id="select2" name="drop_time">
        <option value=""  selected="selected">--Drop Time--</option>
        <option value="01:00">01:00</option>
        <option value="02:00">02:00</option>
        <option value="03:00">03:00</option>
        <option value="04:00">04:00</option>
        <option value="05:00">05:00</option>
        <option value="06:00">06:00</option>
        <option value="07:00">07:00</option>
        <option value="08:00">08:00</option>
        <option value="09:00">09:00</option>
        <option value="10:00">10:00</option>
        <option value="11:00">11:00</option>
        <option value="22:00">22:00</option>
        <option value="23:00">23:00</option>
        <option value="24:00">24:00</option>
        <option value="12:00">12:00</option>
        <option value="13:00">13:00</option>
        <option value="14:00">14:00</option>
        <option value="15:00">15:00</option>
        <option value="17:00">17:00</option>
        <option value="18:00">18:00</option>
        <option value="19:00">19:00</option>
        <option value="20:00">20:00</option>
        <option value="21:00">21:00</option>
        <option value="22:00">22:00</option>
        <option value="23:00">23:00</option>
        <option value="24:00">24:00</option>
      </select>
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Want to drive yourself ?
        <label>
        <input type="checkbox" name="checkbox" value="checkbox" />
      </label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="45">&nbsp;</td>
      <td><label>
          <div align="right">
            <input type="submit" name="submit" value="Submit" />
          </div>
      </label></td>
      <td><label>
        <input type="submit" name="Submit2" value="Submit" />
		
      </label></td>
	  
      <td>
	  <?php
$date2=$_POST['pick_date'];
$date1=$_POST['drop_date'];
$car_choice=$_POST['car_choice'];
echo "You have booked car no. ";
echo $car_choice;
echo "<br>";

$diff=abs(strtotime($date2)-strtotime($date1));
$years=floor($diff/(365*60*60*24));
$months=floor(($diff-$years*365*60*60*24)/(30*60*60*24));
$days=floor(($diff-$years*365*60*60*24-$months*30*60*60*24)/(60*60*24));
$days=floor(($days)+($months*30)+($years*365));
echo "Car Booked For  $days  days<br>";

$two=mysql_query("SELECT hiring_fee FROM car_details WHERE id='$car_choice'");
$fetch=mysql_fetch_array($two);
$get=$fetch['hiring_fee'];
echo $get;

?>
</td>
</tr>
</table>
</form>
<p>&nbsp;</p>
<?php
}
?>