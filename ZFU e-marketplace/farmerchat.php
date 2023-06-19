<?php
//session_start();
error_reporting(0);
if(!isset($_SESSION['logged'])){
die('<script language=javascript> location=("index.php");</script>');
}
?>
<?php
            session_start();
                if(!isset($_SESSION['username'])){
        ?>
<?php 
            if(isset($_GET['message1'])){ 
                $message=$_GET['message1'];
                echo "<h5>$message</h5>";
            }
    ?>
	<?php
        exit;
        }
    
    ?>

	<?php 
                if(isset($_GET['username'])){
                $_GET['username'];
                }
    ?>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script>

	function submitchat(){
		if(form1.msg.value == ''){ //exit if one of the field is blank
			alert('Enter your message !');
			return;
		}
		var msg = form1.msg.value;
		var xmlhttp = new XMLHttpRequest(); //http request instance
		
		xmlhttp.onreadystatechange = function(){ //display the content of insert.php once successfully loaded
			if(xmlhttp.readyState==4&&xmlhttp.status==200){
				document.getElementById('chatlogs').innerHTML = xmlhttp.responseText; //the chatlogs from the db will be displayed inside the div section
			}
		}
		xmlhttp.open('GET', 'insert.php?msg='+msg, true); //open and send http request
		xmlhttp.send();
	}
	$(document).ready(function(e) {
			$.ajaxSetup({cache:false});
			setInterval(function() {$('#chatlogs').load('logs.php');}, 2000);
		});
		
	</script>
<h2>Hi, <?php echo $_SESSION['username']; ?></h2>
	<div id="chatlogs">
<?php include("logs.php"); ?>    </div>
<form name="form1">
	</br> <textarea name="msg" placeholder="Your message here..." style="width:590px; height:30px;"></textarea>
	<aq href="#" onClick="submitchat()" class="button">Send</aq></br></br>
</form>
    </div>
</div>

