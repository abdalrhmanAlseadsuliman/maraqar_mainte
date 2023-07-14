<?php
include "../db/dbConn.php";
include "../mailFunction.php";

session_start();

// if(isset($_SESSION['email']) && !empty($_SESSION['email']) && isset($_SESSION['password']) && !empty($_SESSION['password']) ){
//     $email = $_SESSION['email'];
//     $password = $_SESSION['password'];
//     // $userId = $_SESSION['userId'];
//     var_dump($_SESSION);
//     // echo   $NationalNumber . "   " .$password  ;
// }else{
//     header('location: ./login_maraqar.php');
// }

    // $firstName = $_POST['FirstName'];
    // $lastName = $_POST['LastName'];
    // $nationalNumber = $_POST['NationalNumber'];
    // $phoneNumber = $_POST['Phone'];
    // $email = $_POST['Email'];
    // $password = $_POST['password'];
    // $confirmPassword = $_POST['confirmPassword'];
    // $v_cod=bin2hex(random_bytes(16));


function validate_required_fields($fields){
    foreach($fields as $field){
        if(empty($_POST[$field])){
            return false;
        }
    }
    return true;
}

function validate_password($password, $confirmPassword){
    return $password === $confirmPassword;
}

function validate_email($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function check_email_exists($connection, $email, $nationalNumber){
    $sql = "SELECT UserID FROM users WHERE Email='$email' or NationalNumber = '$nationalNumber'";
    $result = mysqli_query($connection, $sql);
    return mysqli_num_rows($result) > 0;
}

function insert_user($connection, $firstName, $lastName, $nationalNumber, $phoneNumber, $email, $password, $v_cod){
    $sql = "INSERT INTO users (FirstName, LastName, NationalNumber, Phone, Email, Password, verification_id, verification_status) VALUES ('$firstName', '$lastName', '$nationalNumber', '$phoneNumber', '$email', '$password', '$v_cod', '0')";
    return mysqli_query($connection, $sql);
}

function send_verification_email($email, $subject, $message){
    // استخدم الدالة المناسبة لإرسال البريد الإلكتروني، مثل PHPMailer أو mail()
    // يمكنك استخدام دالة mailFunction الموجودة في ملف mailFunction.php
    return sendmail($email, $subject, $message);
}
// var_dump($_SESSION);

if(true){
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $nationalNumber = $_POST['NationalNumber'];
    $phoneNumber = $_POST['Phone'];
    $email = $_POST['Email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $v_cod=bin2hex(random_bytes(16));
    $message = "Thanks for registration.<br>click the link bellow to verify the email address <a href='http://localhost/php/newMaint/users/verify.php?email=$email&v_cod=$v_cod'>verify</a>";
    $subject = 'التحقق من البريد الالكتروني ';

    $required_fields = array('FirstName', 'LastName', 'NationalNumber', 'Phone', 'Email', 'password', 'confirmPassword');

    if(!validate_required_fields($required_fields)){
        echo "<p>الرجاء ملء جميع الحقول المطلوبة.</p>";
    } else if(!validate_password($password, $confirmPassword)){
        echo "<p>كلمة السر وتأكيدها غير متطابقين.</p>";
    } else if(!validate_email($email)){
        echo "<p>البريد الإلكتروني غير صحيح.</p>";
    } else if(check_email_exists($connection, $email, $nationalNumber)){
        echo "<p>البيانات مسجلة بالفعل.</p>";
    } else {
        if(insert_user($connection, $firstName, $lastName, $nationalNumber, $phoneNumber, $email, $password, $v_cod) && send_verification_email($email, $subject, $message)){           
              $_SESSION['email'] = $email;
              $_SESSION['password'] = $password;
            echo "<p> تم ارسال رسالة الى بريدك الالكتروني يرجى التحقق منها </p>";
            
        } else {
            echo "<p>حدث خطأ أثناء تسجيل الحساب.</p>";
        }
    }
}

?>