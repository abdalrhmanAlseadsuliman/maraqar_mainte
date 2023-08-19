<?php
include "../db/dbConn.php";
// include "../mailFunction.php";

session_start(); 
// var_dump($_SESSION);
// تحقق من إرسال نموذج تسجيل الدخول

if(isset ($_COOKIE['typeUsers']) && !empty($_COOKIE['typeUsers']) && $_COOKIE['typeUsers'] == 'mainte' ){
    header("Location:../admins/dashboardMainte.php");
  
  }elseif(isset ($_COOKIE['typeUsers']) && !empty($_COOKIE['typeUsers']) && $_COOKIE['typeUsers'] == 'admin' ){
    header("Location:../admins/dashboard_admin.php");
  }
if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && !empty($_POST['email'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // echo $email . " " . $password;
    $sql = "SELECT * FROM users WHERE Email =  '$email'";

    // echo $email . " " . $password;
    $result = mysqli_query($connection, $sql);
    // إنشاء كوكيز لتخزين بعض البيانات
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        // تحقق من صحة كلمة المرور
        // echo ("<br>"); 
        // var_dump($user);



        // var_dump($user);
        if ($password == $user['Password']) {
            
                setcookie('email', $email, time() + (86400 * 30), '/');
                setcookie('password', $password, time() + (86400 * 30), '/');
                setcookie('userId', $user['UserID'], time() + (86400 * 30), '/');
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['userId'] = $user['UserID'];

            echo "تم تسجيل الدخول بنجاح";
            
            }else {
            echo "كلمة المرور غير صحيحة";
        }
    } else {
        echo "الايميل غير موجود";
    }
}



?>