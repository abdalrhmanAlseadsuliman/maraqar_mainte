<?php
include "../db/dbConn.php";

session_start(); 


$json = $_POST['json'];
parse_str($json,$data);
// $data1 = json_decode($json, true);
// var_dump($data['opinion_area']);

$sql = "INSERT INTO rating (ResponseSpeed, MainteTechnician, QualityService, SpeedService, ServiceCorresponds, MessageRating,StatusRating ,MainteId) VALUES ('$data[response_speed]', '$data[maitenance_behavior]', '$data[maitenance_service_speed]', '$data[maitenance_service_execution_speed]', '$data[service_and_request]', '$data[opinion_area]','1','$_POST[pID]')";
//  mysqli_query($connection, $sql);

if(mysqli_query($connection, $sql)){
echo "شكرا لقد تلقينا رسالتك";
} else {
    echo "يوجد خطا";
}


// $json = $_POST['jsonRating'];
// parse_str($json,$dataRating);
// $projectId = $_POST['ProjectIdMainte'];

?>