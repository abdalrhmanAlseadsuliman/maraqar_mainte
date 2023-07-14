<?php
// تعريف متغيرات الاتصال بقاعدة البيانات
$servername = 'localhost'; // اسم المضيف
$username = 'root'; // اسم المستخدم
$password = ''; // كلمة المرور
$dbname = 'test'; // اسم قاعدة البيانات

// إنشاء اتصال بقاعدة البيانات
$connection = mysqli_connect($servername, $username, $password, $dbname);

// التأكد من نجاح الاتصال
if (!$connection) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}
?>
