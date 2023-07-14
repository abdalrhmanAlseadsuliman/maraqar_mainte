<?php
include "../db/dbConn.php";
// include "../mailFunction.php";

session_start();


/*
if (isset($_COOKIE['email']) && isset($_COOKIE['password']) && !empty($_COOKIE['password']) && !empty($_COOKIE['email']) ) {
    // استرجاع البيانات من الكوكيز
    $email = $_COOKIE['email'];
    $password = $_COOKIE['password'];
  
    // تعيين بيانات المستخدم في الجلسة
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
  } else

*/


if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && !empty($_POST['email'])) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    // echo $email . " " . $password;
    $sql = "SELECT * FROM admins WHERE email = '$email'";
   
    // echo $email . " " . $password;
    $result = mysqli_query($connection, $sql);
    // // إنشاء كوكيز لتخزين بعض البيانات
    // var_dump($result);
    // $user = mysqli_fetch_assoc($result);
    // var_dump($user);
    // var_dump(mysqli_num_rows($result));

    if (mysqli_num_rows($result)==1) {
        $user = mysqli_fetch_assoc($result);
        // تحقق من صحة كلمة المرور
        // echo ("<br>"); 
        // var_dump($user);

    

        // var_dump($user);
        if ($password == $user['password']) {
            if ($user['typeUsers'] == 'admin'){
            setcookie('email', $email, time() + (86400 * 30), '/');
            setcookie('password', $password, time() + (86400 * 30), '/');
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['userId'] = $user['UserID'];
            // header("Location: ./user_dashboard.php");
            // exit;
            echo "admins";

        }elseif($user['typeUsers'] == 'mainte'){
                setcookie('email', $email, time() + (86400 * 30), '/');
                setcookie('password', $password, time() + (86400 * 30), '/');
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['userId'] = $user['UserID'];
                
                echo "mainte" ;


            }
        } else {
            echo "كلمة المرور غير صحيحة";
        }
    } else {
        echo "الايميل غير موجود";
    }
}
?>
  