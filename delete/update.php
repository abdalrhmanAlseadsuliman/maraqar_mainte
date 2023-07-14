
<?php
include "../db/dbConn.php";

 $status = $_POST['status'];

//   echo $status;
$sql4 = "UPDATE mainte SET Status='$status' WHERE ProjectName='test1'";


  if (mysqli_query($connection, $sql4)) {

// echo $_POST['status'];
  }





?>

<!-- /b>:  Uncaught mysqli_sql_exception: Unknown column 'sds' in 'where clause' 

in D:\xampp\htdocs\maintee\newMaint\admins\update.php:10Stack trace:#0 
D:\xampp\htdocs\maintee\newMaint\admins\update.php(10): 
mysqli_query(Object(mysqli), 'SELECT * FROM `...')#1
 {main}  thrown in 
 <b>D:\xampp\htdocs\maintee\newMaint\admins\update.php</b> on line <b>10</b><br /> -->



 b>:  Uncaught mysqli_sql_exception: You have an error in your SQL syntax; check the manual that corresponds
  to your MariaDB server version for the right syntax to use near 'WHERE ProjectName='test1'' at line 1 in D:\xampp\
  htdocs\maintee\newMaint\admins\update.php:10Stack trace:#0 D:\xampp\htdocs\maintee\newMaint\admins\update.php(10):
   mysqli_query(Object(mysqli), 'UPDATE `mainte`...')#1 {main} 
  thrown in
   <b>D:\xampp\htdocs\maintee\newMaint\admins\update.php</b> on line <b>10</b><br />