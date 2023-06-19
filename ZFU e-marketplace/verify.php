<?php
require_once("phpmailer/class.phpmailer.php");
$email=$_POST['email'];
$message=$_POST['message'];
$subject = $_POST['sub'];
@$dat=date('Y-m-d');
$fro=$_SESSION['usr'];

$number_of_file_fields = 0;
    $number_of_uploaded_files = 0;
    $number_of_moved_files = 0;
    $uploaded_files = array();
    $upload_directory = dirname(__file__) . '/upload/'; //set upload directory
   
    for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
        $number_of_file_fields++;
        if ($_FILES['images']['name'][$i] != '') { //check if file field empty or not
            $number_of_uploaded_files++;
            $uploaded_files[] = $_FILES['images']['name'][$i];
			
            if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $upload_directory . $_FILES['images']['name'][$i])) {
                $number_of_moved_files++;
            }
 
        }
 
    }
  
$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->Host = 'ssl://smtp.gmail.com:465';
$mailer->SMTPAuth = TRUE;
$mailer->Username = 'www.spancho@gmail.com';  // Change this to your gmail adress
$mailer->Password = 'password yako';  // Change this to your gmail password
$mailer->From = 'www.spancho@gmail.com';  // This HAVE TO be your gmail adress
$mailer->FromName = 'ZimFarmersUnion'; // This is the from name in the email, you can put anything you like here
$mailer->Subject = $subject;
$mailer->Body = $message;
$mailer->AddAddress($email); 

for ($i = 0; $i <  $number_of_uploaded_files ; $i++)
{
    $mailer->AddAttachment(  $upload_directory.$_FILES['images']['name'][$i], $_FILES['images']['name'][$i]);
}
			

if(!$mailer->Send())
{
	$done=mysql_query("insert into mails(toh,fro,sub,msg,dat)
  values('$email','$fro','$subject','$message','$dat')") or die(mysql_error());
   echo "<script>alert('Email Sending failed.')</script>";

}
else
{
	$done=mysql_query("insert into mails(toh,fro,sub,msg,dat)
  values('$email','$fro','$subject','$message','$dat')") or die(mysql_error());
echo "<script>alert('Your Email is Successfully Send.')</script>";


}



