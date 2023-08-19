<?php

/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

function sendmail($email, $subject , $message){

    $mail = new PHPMailer();
    // echo $mail,$message;
    try {
        $mail->SMTPDebug  = SMTP::DEBUG_SERVER; 
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;            
        $mail->Username   = 'aboodsuliman1999@gmail.com';
        $mail->Password   = 'wsftqjudjkyzrlvv';                    
        $mail->SMTPSecure = 'ssl';   
        $mail->Port       = 465;                           

        $mail->setFrom('aboodsuliman1999@gmail.com', 'مؤسسة مار العقارية ');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->CharSet = "UTF-8";

        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->send();
            return true;
    } catch (Exception $e) {
            return false;
    }
}

*/


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

function sendmail($email, $subject , $message){

    $mail = new PHPMailer();
    // echo $mail,$message;
    try {
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        $mail->isSMTP();
        $mail->Host       = "box5133.bluehost.com";
        $mail->SMTPAuth   = true;            
        $mail->Username   = "support@maraqar.com";
        $mail->Password   = 't8qhhrct2r';                    
        $mail->SMTPSecure = 'ssl';   
        $mail->Port       = 465;                           

        $mail->setFrom('support@maraqar.com', 'مؤسسة مار العقارية ');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->CharSet = "UTF-8";

        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->send();
            return true;
    } catch (Exception $e) {
            return false;
    }
}

// var_dump(sendmail("abdulrhmanalsead@gmail.com","test","شكر خاص من مؤسسة مارررررررر المتميزة"));

/*

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

function sendmail($email, $subject , $message){

    $mail = new PHPMailer();
    // echo $mail,$message;
    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        $mail->isSMTP();
        $mail->Host       = "box5133.blueHost.com";
        $mail->SMTPAuth   = true;            
        $mail->Username   = "mokhtar.a@maraqar.com";
        $mail->Password   = 'S3aNbWckcj';                    
        $mail->SMTPSecure = 'ssl';   
        $mail->Port       = 465;                           

        $mail->setFrom('support@maraqar', 'مؤسسة مار العقارية ');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->CharSet = "UTF-8";

        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->send();
            return true;
    } catch (Exception $e) {
            return false;
    }
}
*/


?>