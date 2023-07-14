<?php
include "../db/dbConn.php";
session_start();

if(isset($_SESSION['email']) && !empty($_SESSION['email']) && isset($_SESSION['password']) && !empty($_SESSION['password']) ){
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    // var_dump($_SESSION);
    // echo   $NationalNumber . "   " .$password  ;
}else{
    header('location: ./login_maraqar.php');
}


// echo "test 200 <br>" ;
    
    // استقبال البيانات المرسلة من النموذج
    $project_name = $_POST['project_name'];
    $neighborhood = $_POST['neighborhood'];
    $piece_number = $_POST['piece_number'];
    $unit_number = $_POST['unit_number'];
    $floor_number = $_POST['floor_number'];
    $contract_date = $_POST['contract_date'];
    $request_type = $_POST['request_type'];
    $request_description = $_POST['request_description'];
    $userId = $_SESSION['userId'];
    echo $userId . "<br>";
    // var_dump($_POST);
var_dump($_FILES);
    // معالجة الصورة 

    $uploadFolder = 'uploads/';
    $imageNames = array();
    echo "test 300 <br>";
    
    foreach ($_FILES['imageFile']['tmp_name'] as $key => $image) {
        $imageTmpName = $_FILES['imageFile']['tmp_name'][$key];
        $imageName = $_FILES['imageFile']['name'][$key];
        $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);
        $imageNames[] = $imageName;
    echo "test 600 <br>";
        
    }
    var_dump($imageNames);
    echo "test 400 <br>";
    var_dump($result);
    // save to database
    if ($result && !empty($imageNames)) {
        echo "test546 <br>";
       
        $imageNamesStr = implode(",", $imageNames);
        // $query = "INSERT INTO AddImages SET img='$imageNamesStr' " ;
        echo "test546 <br>";
        $sql = "INSERT INTO mainte (ProjectName, Neighborhood, PieceNumber, UnitNumber, FloorNumber, DateContract, TypeRequest, Description, Img,UserIDF) VALUES ('$project_name', '$neighborhood', '$piece_number', '$unit_number', '$floor_number', '$contract_date', '$request_type', '$request_description', '$imageNamesStr', '$userId' )";
        echo "test 800 <br>";
        
        $run = mysqli_query($connection, $sql);
        // var_dump($run);
        echo "test 900 <br>";
        
    }





?>