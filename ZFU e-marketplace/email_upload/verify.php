<?php
require_once("phpmailer/class.phpmailer.php");
$email=$_POST['email'];
$email2=$_POST['email2'];
$message=$_POST['message'];
$subject = $_POST['sub'];


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
$mailer->Username = 'luwymkwembi@gmail.com';  // Change this to your gmail adress
$mailer->Password = 'password yako';  // Change this to your gmail password
$mailer->From = 'luwymkwembi@gmail.com';  // This HAVE TO be your gmail adress
$mailer->FromName = 'RioZim'; // This is the from name in the email, you can put anything you like here
$mailer->Subject = $subject;
$mailer->Body = $message;
$mailer->AddAddress($email); 
$mailer->AddAddress($email2);

for ($i = 0; $i <  $number_of_uploaded_files ; $i++)
{
    $mailer->AddAttachment(  $upload_directory.$_FILES['images']['name'][$i], $_FILES['images']['name'][$i]);
}
			

if(!$mailer->Send())
{
   echo "<script>alert('Email Sending failed.')</script>";

}
else
{
echo "<script>alert('Your Email is Successfully Send.')</script>";


}


