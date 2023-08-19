<?php

include "../db/dbConn.php";
include "../mailFunction.php";

$json = $_POST['json'];
$data = json_decode($json, true);
// var_dump($data);
// echo($data);
if (isset($_POST['status'])) {
    $status = $_POST['status'];
    if ($status == "تم الاستلام") {

        $sql = "UPDATE mainte SET Status = '$status' WHERE ProjectId = '$data[ProjectId]'";
        
        $sqlMainteTable = "SELECT MainteId FROM mainte WHERE ProjectId = '$data[ProjectId]'";
        $ressMainteTable = mysqli_query($connection, $sqlMainteTable);
        $rowMainteTable = $ressMainteTable->fetch_assoc();
        // var_dump($rowMainteTable);
        // mysqli_num_rows($ressMainteTable)>0
        if ($rowMainteTable['MainteId'] !== NULL) {
            $sqlMainte = "SELECT Email FROM admins WHERE Id = '$rowMainteTable[MainteId]'";
            $ress = mysqli_query($connection, $sqlMainte);
            $row = $ress->fetch_assoc();
            
            if (mysqli_query($connection, $sql)) {
                $email = $data['Email'];
                $subject = "تم استلام الطلب";
                $message = "تم استلام طلب الصيانة وتحويله الى الفني المختص سوف يقوم بالتواصل  ";
                sendmail($email, $subject, $message);
               
                $email = $row['Email'];
                $subject = "لديك طلب صيانة جديدة";
                $message = " لقد تم تحويل طلب صيانة لك يرجى الاطلاع عليه والتواصل مع العميل ";
                sendmail($email, $subject, $message);
                
    
                echo $data['Status'] . "  test  " . $status;
    
                //     // echo   "UPDATE Status";
    
    
            } 
        }else {
            echo "يرجى اختيار فني ليقوم بإنجاز الطلب ";
        }
        
    }
} elseif (isset($_POST['notes'])) {
    $notes = $_POST['notes'];

    $sql = "UPDATE mainte SET notes = '$notes' WHERE ProjectId = '$data[ProjectId]'";
    // $ress = mysqli_query($connection, $sql);
    // $row = $ress->fetch_assoc();
    if (mysqli_query($connection, $sql)) {
        echo $data['notes'] . "  test  " . $notes;
    } else {
        echo   "error";
    }
} elseif (isset($_POST['visit'])) {
    $visit = $_POST['visit'];

    $sql = "UPDATE mainte SET visit = '$visit' WHERE ProjectId = '$data[ProjectId]'";
    // $ress = mysqli_query($connection, $sql);
    // $row = $ress->fetch_assoc();
    if (mysqli_query($connection, $sql)) {
        echo $data['visit'] . "  test  " . $visit;
    } else {
        echo   "error";
    }
} elseif (isset($_POST['endRequestClient'])) {
    $endRequest = $_POST['endRequestClient'];
    // echo "test56";
    var_dump($endRequest);
    // echo "test56";
    var_dump($_POST['endRequestClient']);
    $staty = $_POST['staty'];


    if ($endRequest == $data['codeRequest']) {
        //    echo "syy";

        $sql = "UPDATE mainte SET Status ='$staty' WHERE ProjectId = '$data[ProjectId]'";
        // echo "test5dd6";
        // $ress =
        $ee = mysqli_query($connection, $sql);
        echo "تم الانتهاء";
        // $row = $ress->fetch_assoc();
        // var_dump($row);
        // echo $data['Status']. "  test  " . $row['Status'] ;
        // ارسال ايميل للعميل
    } else {
        echo   "error";
    }
} elseif (isset($_POST['reject']) && !empty($_POST['reject'])) {

    $message = $_POST['messagelatter'];
    $sql = "UPDATE mainte SET Status = 'مرفوض', messageReject = '$message'  WHERE ProjectId = '$data[ProjectId]'";
    // مشكلة هون ما لازم حسب الاسم 
    // $ress = mysqli_query($connection, $sql);
    // $row = $ress->fetch_assoc();
    if (mysqli_query($connection, $sql)) {

        $email = $data['Email'];
        $subject = "رفض طلب الصيانة";
        sendmail($email, $subject, $message);


        echo  "لقد تم رفض الطلب";

        //     // echo   "UPDATE Status";


    } else {
        echo   " error ";
    }
} elseif (isset($_POST['rejectVisit']) && !empty($_POST['rejectVisit'])) {
    $message = "لقد قمنا بالزيارة عدة مرات ولم نجد احد";
    // $message = "errrrrror"  ;
    $numberVisit = (int) $_POST['numberVisit'];

    if ($numberVisit >= 3) {
        $sql = "UPDATE mainte SET Status = '$_POST[rejectVisit]', messageReject = '$_POST[messageReject]'  WHERE ProjectId = '$data[ProjectId]'";
        if (mysqli_query($connection, $sql)) {
            $email = $data['Email'];

            $subject = "طلب الصيانة مرفوض";
            sendmail($email, $subject, $message);

            echo "تم التعديل";

            //     // echo   "UPDATE Status";


        } else {
            echo   " error ";
        }
    } else {
        echo "عدد الزيرات اقل من 3";
    }


    // $message = $_POST['messagelatter'];
    // مشكلة هون ما لازم حسب الاسم 
    // $ress = mysqli_query($connection, $sql);
    // $row = $ress->fetch_assoc();

} elseif (isset($_POST['SelectMainte']) && !empty($_POST['SelectMainte'])) {
    $SelectMainteId = $_POST['SelectMainte'];
    $nameMainte = trim($_POST['nameMainte']);

    $sql = "UPDATE mainte SET MainteId = '$SelectMainteId', MainteName = '$nameMainte' WHERE ProjectId = '$data[ProjectId]'";
    // $ress = mysqli_query($connection, $sql);
    // $row = $ress->fetch_assoc();
    if (mysqli_query($connection, $sql)) {
        echo "تم تعين الفني بنجاح";
    } else {
        echo   "error";
    }
}
