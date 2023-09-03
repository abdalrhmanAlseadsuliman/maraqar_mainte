<?php
include "../db/dbConn.php";

// session_start(); 


$json = $_POST['jsonRating'];
$data = json_decode($json, true);
$data['opinion_area'] = trim($data['opinion_area']);
if(
    isset($data['response_speed']) &&  isset($data['maitenance_behavior']) &&  isset($data['maitenance_service_speed']) &&  isset($data['maitenance_service_execution_speed']) &&  isset($data['service_and_request']) &&  isset($data['opinion_area']) && isset($data['ProjectIdMainte']) && 
    !empty($data['response_speed']) &&  !empty($data['maitenance_behavior']) &&  !empty($data['maitenance_service_speed']) &&  !empty($data['maitenance_service_execution_speed']) &&  !empty($data['service_and_request']) &&  !empty($data['opinion_area']) && isset($data['ProjectIdMainte'])
  ){

$sql = "INSERT INTO rating (ResponseSpeed, MainteTechnician, QualityService, SpeedService, ServiceCorresponds, MessageRating,StatusRating ,MainteId) VALUES ('$data[response_speed]', '$data[maitenance_behavior]', '$data[maitenance_service_speed]', '$data[maitenance_service_execution_speed]', '$data[service_and_request]', '$data[opinion_area]','1','$data[ProjectIdMainte]')";


if(mysqli_query($connection, $sql)){
echo "شكرا لقد تلقينا رسالتك";
}else {
    echo "errrrrrrror";
}


}
else {
    echo "يرجى ملئ جميع الحقول";
}

// $json = $_POST['jsonRating'];
// parse_str($json,$dataRating);
// $projectId = $_POST['ProjectIdMainte'];

?>