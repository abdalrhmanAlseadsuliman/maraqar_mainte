<?php
include "../db/dbConn.php";
session_start();


function generateRandomCode($length) {
    
    $bytes = random_bytes($length);
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';

    for ($i = 0; $i < $length; $i++) {
        $index = ord($bytes[$i]) % strlen($characters);
        $code .= $characters[$index];
    }

    return $code;
}


if (isset($_COOKIE['email']) && isset($_COOKIE['password']) && !empty($_COOKIE['password']) && !empty($_COOKIE['email']) && isset($_COOKIE['userId']) && !empty($_COOKIE['userId'])) {
  

    // استرجاع البيانات من الكوكيز
    // تعيين بيانات المستخدم في الجلسة
    var_dump($_COOKIE);
    $_SESSION['email'] = $_COOKIE['email'];
    $_SESSION['password'] = $_COOKIE['password'];
    $_SESSION['userId'] = $_COOKIE['userId'];
    // var_dump($_SESSION);
    if(isset($_POST['project_name']) && isset($_POST['neighborhood']) && isset($_POST['piece_number']) && isset($_POST['unit_number']) && isset($_POST['floor_number']) && isset($_POST['contract_date']) && isset($_POST['request_type']) && isset($_POST['request_description'])){
        
        // استقبال البيانات المرسلة من النموذج
        $project_name = $_POST['project_name'];
        $neighborhood = $_POST['neighborhood'];
        $piece_number = $_POST['piece_number'];
        $unit_number =  $_POST['unit_number'];
        $floor_number = $_POST['floor_number'];
        $contract_date= $_POST['contract_date'];
        $request_type = $_POST['request_type'];
        $request_description = $_POST['request_description'];
        $userId = $_SESSION['userId'];
       
        do {
            $codeRequestValue= generateRandomCode(6);
            $query = "SELECT codeRequest FROM mainte WHERE codeRequest = '$codeRequestValue'";
            $result = mysqli_query($connection, $query);

        } while (mysqli_num_rows($result) > 0);

        
        

        // echo $userId . "<br>";
    
        // معالجة الصورة 

        $uploadFolder = 'uploads/';
        $imageNames = array();
        // echo "test 300 <br>";
        // var_dump($_FILES);
        foreach ($_FILES['imageFile']['tmp_name'] as $key => $image) {
            $imageTmpName = $_FILES['imageFile']['tmp_name'][$key];
            $imageName = $_FILES['imageFile']['name'][$key];
            $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);
            $imageNames[] = $imageName;
            // echo "test 600 <br>";
        }
        // var_dump($imageNames);
        // echo "test 400 <br>";
    }
        // var_dump($result);
        // save to database
        if ($result && !empty($imageNames)) {
            // echo "test546 <br>";
        
            $imageNamesStr = implode(",", $imageNames);
            // $query = "INSERT INTO AddImages SET img='$imageNamesStr' " ;
            // echo "test546 <br>";
            $sql = "INSERT INTO mainte (ProjectName, Neighborhood, PieceNumber, UnitNumber, FloorNumber, DateContract, TypeRequest, Description, Img, visit,codeRequest, UserIDF) VALUES ('$project_name', '$neighborhood', '$piece_number', '$unit_number', '$floor_number', '$contract_date', '$request_type', '$request_description', '$imageNamesStr','0','$codeRequestValue', '$userId' )";
            // echo "test 800 <br>";
            
            $run = mysqli_query($connection, $sql);
            echo "تم تسجيل طلبك بنجاح"; // ارسال ايميل للعميل لا تنسى ;
            
        
        
    }else {
       
        echo "يجب ملئ جميع الحقول" ;
    }

  }else{
    header("Location:login_maraqar.php");
  }

   


?>