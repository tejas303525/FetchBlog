<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ?? '';
    $email = $_POST["email"] ?? '';
    $phone = $_POST["phone"] ?? '';
    $project = $_POST["project"] ?? '';
    $subject = $_POST["subject"] ?? '';
    $message = $_POST["message"] ?? '';

    $mail = new PHPMailer(true);

    try {
	    $mail->isSMTP();                               
	    $mail->Host = 'smtp.gmail.com'; 
	    $mail->SMTPAuth   = true;
	    //Your Email
	    $mail->Username= 'motocarparadise@gmail.com';
	    //App password
	    $mail->Password = 'dqeeceodotewvrjv'; 
	    $mail->SMTPSecure = "ssl";          
	    $mail->Port       = 465;                                  
	    //Recipients
	    $mail->setFrom($email, $name);   
	    // your Email
	    $mail->addAddress('motocarparadise@gmail.com'); 


        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = "
            <h3>New Contact Request</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Project:</strong> $project</p>
            <p><strong>Message:</strong><br>$message</p>
        ";
	    $mail->send();
	    $sm= 'Message has been sent';
    	header("Location: index.html?success=$sm");
	} catch (Exception $e) {
	    $em = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    	header("Location: index.html?error=$em");
	}

}
?>
