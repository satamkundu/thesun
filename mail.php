<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Load Composer's autoloader
// require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.thesunpurifier.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@thesunpurifier.com';                     //SMTP username
    $mail->Password   = '!QQ*J]0Ur_.5';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('info@thesunpurifier.com', 'thesunpurifier');
    $mail->addAddress('satamkundu67@gmail.com', 'Satam Kundu');     //Add a recipient
    // $mail->addAddress('thesun022021@gmail.com', 'thesun022021');
    
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['message'];
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'New Contact Request Came...';
    $mail->Body    = "New Contact Request Came, The given details below <br>Name : {$name}<br>Email : {$email} <br> Subject : {$subject} <br> Message : {$msg}";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>