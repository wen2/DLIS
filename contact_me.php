<?php
// check if fields passed are empty
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
$phone = $_POST['phone'];
	
// create email body and send it	
$to = 'tiejun.wen@rutgers.edu'; // put your email
$email_subject = "Contact form submitted by:  $name";
$email_body = "You have received a new message. \n\n".
				  " Here are the details:\n \nName: $name \n ".
				  " Phone: $phone \n ".
				  "Email: $email_address\n Message \n $message";
				  
$headers = "From: contacts@rutgers.edu\n";
$headers .= "Reply-To: $email_address";	
// may not send email
mail($to,$email_subject,$email_body,$headers);
echo 'Send the email';
return true;			
?>