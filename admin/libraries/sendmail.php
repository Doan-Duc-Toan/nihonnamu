<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require 'vendor/autoload.php';
require 'PHPmailer/PHPMailer-master/src/Exception.php';
require 'PHPmailer/PHPMailer-master/src/PHPMailer.php';
require 'PHPmailer/PHPMailer-master/src/SMTP.php';
$mail = new PHPMailer(true);

//Create an instance; passing `true` enables exceptions
function send_mail($recepient_name, $recepient_address,$subject, $body){
$mail = new PHPMailer(true);
global $config;
try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $config['email']['smtp_host'];                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $config['email']['smtp_user'];                     //SMTP username
    $mail->Password   = $config['email']['smtp_pass'];                               //SMTP password
    $mail->SMTPSecure = $config['email']['smtp_secure'];            //Enable implicit TLS encryption
    $mail->Port       = $config['email']['smtp_port']; //SMTP port     
    $mail ->CharSet = $config['email']['charset']; //;
    //Recipients
    $mail->setFrom($config['email']['smtp_user'], $config['email']['smtp_fullname']);
    $mail->addAddress($recepient_address, $recepient_name);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo($config['email']['smtp_user'], $config['email']['smtp_fullname']);
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments //Thêm file đính kèm gửi cho khách hàng
    // $mail->addAttachment('anhdep.png');         //Add attachments
    // $mail->addAttachment('anhdep.png', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    return true;
} catch (Exception $e) {
    echo "Email không được gửi. Chi tiết lỗi: {$mail->ErrorInfo}";
}
}