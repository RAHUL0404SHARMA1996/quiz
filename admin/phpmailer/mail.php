<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    //Server settings
                       // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'zotak007@gmail.com';                 // SMTP username
    $mail->Password = 'avi9007501342';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
	$to=$_POST['emailto']; 
	
	$mail->FromName = 'QzBz';
    $mail->setFrom('zotak007@gmail.com');
    $mail->addAddress($to);     // Add a recipient
   
	$msg=$_POST['msg']; 
	
	
    //Attachments
    //$mail->addAttachment('F:\doc.pdf');         // Add attachments
   // $mail->addAttachment('C:\xampp\htdocs\phpmailer\shop_2.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = '<no-reply>QuIzBuZz-Feedback';
    $mail->Body    = $msg;
   
try {
   if( $mail->send())
    echo 1;
	
} catch (Exception $e) {
    echo 0;
}