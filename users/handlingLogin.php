<?php
include "../db/dbConn.php";
// include "../mailFunction.php";

session_start(); 
// var_dump($_SESSION);
// تحقق من إرسال نموذج تسجيل الدخول
if(true) {
    // $NationalNumber = $_POST['NationalNumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // استعلام لجلب المستخدم المطابق للرقم الوطني
    $sql = "SELECT * FROM users WHERE Email =  '$email' ";
    $result = mysqli_query($connection, $sql);
    
    // تحقق من وجود المستخدم
    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        // var_dump($user);
        // تحقق من صحة كلمة المرور
        if($password == $user['Password']) {
            $_SESSION['password'] =$password;
            $_SESSION['email'] = $email; 
            $_SESSION['userId'] = $user['UserID'];
            

            // header("Location: ./user_dashboard.php");
            // exit;
            echo "تم تسجيل الدخول بنجاح";
        } else {
            echo "كلمة المرور غير صحيحة";
        }
    } else {
        echo "الرقم الوطني غير موجود";
    }
}

?>