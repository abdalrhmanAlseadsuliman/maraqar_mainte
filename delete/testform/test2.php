<?php
include 'db_connect.php';


$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
echo $name;
if($name == '' || $email == '' || $subject == '' || $message == ''){
	echo "Please fill all fields";
}else{
	
	$sql = "INSERT INTO testyy(name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

if ($connection->query($sql) === TRUE) {
	echo $name;
    echo "تم إدخال البيانات بنجاح";
} else {
    echo "خطأ في إدخال البيانات: " . $connection->error;
}

// إغلاق الاتصال بقاعدة البيانات
$connection->close();
	// echo "Form Submitted Succesfully. The details are:"."<br><br>";
	// echo "<b>Name:</b> ".$name."<br>";
	// echo "<b>Email:</b> ".$email."<br>";
	// echo "<b>Subject:</b> ".$subject."<br>";
	// echo "<b>Message:</b> ".$message;
}
?>
