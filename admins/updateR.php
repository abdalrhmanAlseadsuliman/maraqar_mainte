<?php

include "../db/dbConn.php";
include "../mailFunction.php";

$json = $_POST['json'];
$data = json_decode($json, true);
$status = $_POST['status'];
// var_dump($data);
echo $data['ProjectName'] . " " . $status . " <br>";
// var_dump($status);

// echo $data['Status']. " test " . $status ;

//   echo $status;

// $projectName = mysqli_real_escape_string($connection, $data['ProjectName']);
// $sql = "SELECT * FROM users WHERE Email='$email'";

// $ress= mysqli_query($connection, $sql);
$sql = "UPDATE mainte SET Status = '$status' WHERE ProjectName = '$data[ProjectName]'";
// $ress = mysqli_query($connection, $sql);
// $row = $ress->fetch_assoc();
if(mysqli_query($connection, $sql))
   {
    $email = "abdulrhmanalsead@gmail.com";
    $subject = "ايميل جديد";
    $message = "لقد تم تحويل ايميل لك"; 
    sendmail($email, $subject , $message);
    
    echo $data['Status']. "  test  " . $status ;

//     // echo   "UPDATE Status";

}else {
    echo   " error ";

}


?>