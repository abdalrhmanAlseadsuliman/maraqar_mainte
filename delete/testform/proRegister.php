<?php

 include "db_connect.php";
 session_start();
$ss=$_POST['FirstName'];
echo "$ss";


// include "../mailFunction.php";
// session_start();

// function validate_required_fields($fields){
//     foreach($fields as $field){
//         if(empty($_POST[$field])){
//             return false;
//         }
//     }
//     return true;
// }

// function validate_password($password, $confirmPassword){
//     return $password === $confirmPassword;
// }

// function validate_email($email){
//     return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
// }

// function check_email_exists($connection, $email, $nationalNumber){
//     $sql = "SELECT UserID FROM users WHERE Email='$email' or NationalNumber = '$nationalNumber'";
//     $result = mysqli_query($connection, $sql);
//     return mysqli_num_rows($result) > 0;
// }

function insert_user($connection, $firstName, $lastName, $nationalNumber, $phoneNumber, $email, $password, $v_cod){
    $sql = "INSERT INTO users (FirstName, LastName, NationalNumber, Phone, Email, Password, verification_id, verification_status) VALUES ('$firstName', '$lastName', '$nationalNumber', '$phoneNumber', '$email', '$password', '$v_cod', '0')";
    return mysqli_query($connection, $sql);
}

// function send_verification_email($email, $subject, $message){
//     // استخدم الدالة المناسبة لإرسال البريد الإلكتروني، مثل PHPMailer أو mail()
//     // يمكنك استخدام دالة mailFunction الموجودة في ملف mailFunction.php
//     return sendmail($email, $subject, $message);
// }


    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $nationalNumber=9999876765;
    $phoneNumber = $_POST['Phone'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $confirmPassword = $_POST['ConfirmPassword'];
    $v_cod=75;
//     $v_cod=bin2hex(random_bytes(16));
//     $message = "Thanks for registration.<br>click the link bellow to verify the email address <a href='http://localhost/php/php%20maint/users/verify.php?email=$email&v_cod=$v_cod'>verify</a>";
//     $subject = 'التحقق من البريد الالكتروني ';

//     $required_fields = array('FirstName', 'LastName', 'NationalNumber', 'Phone', 'Email', 'password', 'confirmPassword');

//     if(!validate_required_fields($required_fields)){
//         echo "<p>الرجاء ملء جميع الحقول المطلوبة.</p>";
//     } else if(!validate_password($password, $confirmPassword)){
//         echo "<p>كلمة السر وتأكيدها غير متطابقين.</p>";
//     } else if(!validate_email($email)){
//         echo "<p>البريد الإلكتروني غير صحيح.</p>";
//     } else if(check_email_exists($connection, $email, $nationalNumber)){
//         echo "<p>البيانات مسجلة بالفعل.</p>";
//     } else {
        if(insert_user($connection, $firstName, $lastName, $nationalNumber, $phoneNumber, $email, $password, $v_cod) ){           
            echo "<p> تم ارسال رسالة الى بريدك الالكتروني يرجى التحقق منها </p>";
        } else {
            echo "<p>حدث خطأ أثناء تسجيل الحساب.</p>";}
//         }
//     }


// ?>