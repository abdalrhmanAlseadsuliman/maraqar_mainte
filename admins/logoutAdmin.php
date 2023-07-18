<!-- <?php 
    // session_start();
    // session_unset();
    // session_destroy();
    // header("location:./login_maraqar.php");

    
?> -->

<?php
// تأكد من بدء الجلسة قبل القيام بأي شيء آخر
session_start();

// إزالة الكوكيز المرتبطة بموقعك
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}

// إنهاء الجلسة
session_unset();
session_destroy();

// إعادة توجيه المستخدم إلى صفحة تسجيل الدخول
header("Location:loginAdmin.php");
exit();
?>