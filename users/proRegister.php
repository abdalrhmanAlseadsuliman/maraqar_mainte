<?php
include "../db/dbConn.php";
include "../mailFunction.php";

session_start();

if(isset ($_COOKIE['typeUsers']) && !empty($_COOKIE['typeUsers']) && $_COOKIE['typeUsers'] == 'mainte' ){
    header("Location:../admins/dashboardMainte.php");
  
  }elseif(isset ($_COOKIE['typeUsers']) && !empty($_COOKIE['typeUsers']) && $_COOKIE['typeUsers'] == 'admin' ){
    header("Location:../admins/dashboard_admin.php");
  }

function validate_required_fields($fields){
    foreach($fields as $field){
        if(empty($_POST[$field])){
            return false;
        }
    }
    return true;
}

function isPasswordStrong($password)
{
    // يحتوي الرمز المرجعي على مجموعة من الأحرف الممكنة التي قد تستخدم في كلمة مرور قوية
    $referenceChars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+{}|:<>?,./';

    // يتم تحديد الحد الأدنى لطول كلمة المرور وعدد الأحرف المختلفة المطلوبة من الرمز المرجعي
    $minLength = 8;
    $minDiffChars = 3;

    // تحقق من أن كلمة المرور تلبي الحد الأدنى لطولها
    if (strlen($password) < $minLength) {
        echo " كلمة المرور قصيرة يجب ان تكون اكبر من ثمانية ارقام ";
        return false;
    }

    $diffChars = 0;

    // يتم التحقق من وجود الأحرف المختلفة في كلمة المرور وحساب الأحرف المختلفة
    for ($i = 0; $i < strlen($referenceChars); $i++) {
        if (strpos($password, $referenceChars[$i]) !== false) {
            $diffChars++;
        }
    }

    // يتم التحقق من أن كلمة المرور تحتوي على عدد كافٍ من الأحرف المختلفة
    if ($diffChars < $minDiffChars) {
        echo "كلمة المرور ضعيفة جدا حول استخدام احرف كبيرة وصغيرة وارقام ورموز";
        return false;
    }

    // تمرير جميع المعايير ، وبالتالي فإن كلمة المرور قوية
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

if(isset($_POST['FirstName']) && isset($_POST['LastName']) && isset($_POST['NationalNumber']) && isset($_POST['Phone']) && isset($_POST['password']) && isset($_POST['confirmPassword'])){
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
    }else if(!isPasswordStrong($password)){
       
    }else if(!validate_password($password, $confirmPassword)){
        echo "<p>كلمة السر وتأكيدها غير متطابقين.</p>";
    } else if(!validate_email($email)){
        echo "<p>البريد الإلكتروني غير صحيح.</p>";
    } else if(check_email_exists($connection, $email, $nationalNumber)){
        echo "<p>البيانات مسجلة بالفعل.</p>";
    } else {
        if(insert_user($connection, $firstName, $lastName, $nationalNumber, $phoneNumber, $email, $password, $v_cod) && send_verification_email($email, $subject, $message)){           
              
            echo " تم ارسال رسالة الى بريدك الالكتروني يرجى التحقق منها ";
            
        } else {
            echo "حدث خطأ أثناء تسجيل الحساب.";
        }
    }
}

?>