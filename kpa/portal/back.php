<?php 
function generateRandomString($length = 8) {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



if(isset($_GET['id'])){
$id=$_GET['id'];	
}else{
$id=$_POST['id'];		
}

switch($id){
							
							case 1:
							$name=$_GET['name'];
							$email='';
							$phone=$_GET['phone'];
							$message='Enquiry on Property Portal-Email from '.$name;
							

							$to='info@qet.co.ke';
							$subject = 'Enquiry on Property Portal';
							$reply=$email;
							
							$headers='';
							$headers .= "Reply-To: ".$name." <".$email.">\r\n";
							$headers .= "Return-Path: ".$name." <info@qet.co.ke>\r\n";
							$headers .= "From: ".$name." <".$email.">\r\n";
							$headers .= "MIME-Version: 1.0\r\n";
							$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";



							  if(mail(@$to, $subject, $message,$headers)) {

								echo '<script>swal("Success!", "Account Creation Request Submitted!", "success");</script>';
								
								exit;
							} else {
								echo '<script>swal("Error", "Account Creation Request not Submitted. Please Try again Later.", "error");</script>';
							}

                           
						
							break;

							case 2:
							$name=$_GET['name'];
							$email=$_GET['email'];
							$message=$_GET['message'];
							$subject = 'Enquiry on Property Portal';
							

							$to='info@qet.co.ke';
							$reply=$email;
							
							$headers='';
							$headers .= "Reply-To: ".$name." <".$email.">\r\n";
							$headers .= "Return-Path: ".$name." <info@qet.co.ke>\r\n";
							$headers .= "From: ".$name." <".$email.">\r\n";
							$headers .= "MIME-Version: 1.0\r\n";
							$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";



							  if(mail(@$to, $subject, $message,$headers)) {

								echo '<script>swal("Success!", "Message Sent!", "success");</script>';
								
								exit;
							} else {
								echo '<script>swal("Error", "Message not sent. Please Try again Later.", "error");</script>';
							}

                           
						
							break;



}