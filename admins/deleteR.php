<?php

include '../db/dbConn.php';

$json = $_POST['json'];
$data = json_decode($json, true);


$sql = "DELETE FROM mainte WHERE ProjectId = '$data[ProjectId]' ";

// $ress= mysqli_query($connection, $sql);
// $row = $ress->fetch_assoc();
if(mysqli_query($connection, $sql)){
    // header('Location:dashboard_admin.php' );
    
    echo "تم الحذف";
}else{

    echo "هناك خطأ";
    

}
// var_dump($ress);
// echo $ress['Email'];


?>