<?php
include "../db/dbConn.php";
// include "../mailFunction.php";

session_start();
function isPasswordStrong($password)
{
    // يحتوي الرمز المرجعي على مجموعة من الأحرف الممكنة التي قد تستخدم في كلمة مرور قوية
    $referenceChars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+{}|:<>?,./';

    // يتم تحديد الحد الأدنى لطول كلمة المرور وعدد الأحرف المختلفة المطلوبة من الرمز المرجعي
    $minLength = 8;
    $minDiffChars = 3;

    // تحقق من أن كلمة المرور تلبي الحد الأدنى لطولها
    if (strlen($password) < $minLength) {
        echo " كلمة المرور قصيرة يجب ان تكون اكبر من ثمانية ارقام ";
        return false;
    }

    $diffChars = 0;

    // يتم التحقق من وجود الأحرف المختلفة في كلمة المرور وحساب الأحرف المختلفة
    for ($i = 0; $i < strlen($referenceChars); $i++) {
        if (strpos($password, $referenceChars[$i]) !== false) {
            $diffChars++;
        }
    }

    // يتم التحقق من أن كلمة المرور تحتوي على عدد كافٍ من الأحرف المختلفة
    if ($diffChars < $minDiffChars) {
        echo "كلمة المرور ضعيفة جدا حول استخدام احرف كبيرة وصغيرة وارقام ورموز";
        return false;
    }

    // تمرير جميع المعايير ، وبالتالي فإن كلمة المرور قوية
    return true;
}

function isPasswordMatch($password, $confirmPassword)
{
    // يتحقق من تطابق كلمة المرور وتأكيد الكلمة
    if ($password !== $confirmPassword) {
        echo "كلمات المرور غير متطابقة";
        return false;
    }

    // تمرير جميع المعايير ، وبالتالي فإن تطابق كلمة المرور صحيح
    return true;
}

function validate_email($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}
;

$json = $_POST['json'];
// $data = json_decode($json, true);
parse_str($json,$data);
// var_dump($data);
// var_dump($data['userName']);

if($_POST['submitType']=="register"){
    // var_dump($_POST['json']);

    $json = $_POST['json'];
    parse_str($json,$data);

    // if (is_object($data)) {
    //     $dataArr = get_object_vars($data);
    //     // يمكن استخدام $rowArray كمصفوفة PHP
    //   }
    var_dump($data['email']);
    if(validate_email($data['email'])==false){
        echo "يرجى ادخال ايميل صحيح";
    }else{
        $sql = "SELECT * FROM admins WHERE Email = '$data[email]' ";
        $result = mysqli_query($connection, $sql);
        if(mysqli_num_rows($result)==1){
            echo "الايميل موجود مسبقا";
        }elseif(isPasswordStrong($data['password']) && isPasswordMatch($data['password'],$data['confirmPassword']) ){
            $sql = "INSERT INTO admins (UserName,Email,Password,TypeUsers) VALUES ('$data[userName]','$data[email]','$data[password]', 'mainte')";
            if(mysqli_query($connection,$sql)){
               
                echo "تم إدخال الفني بنجاح";
            }else{
                echo "هناك خطا حاول مرة اخرى";
            }
        }

    }


}elseif (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && !empty($_POST['email'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // echo $email . " " . $password;
    $sql = "SELECT * FROM admins WHERE Email = '$email'";

    // echo $email . " " . $password;
    $result = mysqli_query($connection, $sql);
    // // إنشاء كوكيز لتخزين بعض البيانات
    // var_dump($result);
    // $user = mysqli_fetch_assoc($result);
    // var_dump($user);
    // var_dump(mysqli_num_rows($result));

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        // تحقق من صحة كلمة المرور
        // echo ("<br>"); 
        // var_dump($user);


        $pass = trim( $user['Password']); 
        // var_dump($user);
        if ($password == $pass) {
            if ($user['TypeUsers'] == 'admin') {
                setcookie('email', $email, time() + (86400 * 30), '/');
                setcookie('password', $password, time() + (86400 * 30), '/');
                setcookie('typeUsers', "admin", time() + (86400 * 30), '/');
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;

                echo "admins";
            } elseif ($user['TypeUsers'] == 'mainte') {
                setcookie('email', $email, time() + (86400 * 30), '/');
                setcookie('password', $password, time() + (86400 * 30), '/');
                setcookie('typeUsers', "mainte", time() + (86400 * 30), '/');

                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;

                echo "mainte";
            }
        } else {
            echo "كلمة المرور غير صحيحة";
        }
    } else {
        echo "الايميل غير موجود";
    }
}


?>