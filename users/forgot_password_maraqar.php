<?php 
include "../db/dbConn.php";
include "../mailFunction.php";
session_start();

?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
  <title>نسيت كلة السر ؟</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <link rel="stylesheet" href="CSS/UserRegisteration.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">


</head>


<body>

  <section class="vh-100" style="background-image:url(../Images/slider1.png);">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-8">
          <div class="card text-black " style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row g-0">
                <div class="col-lg-6">
                  <div class="card-body p-md-5 mx-md-4">

                    <br>
                    <br>


                    <br>
                    <br>
                    <br>
                    <?php
                    if(!isset($_GET['v_cod'])){
                        echo '<form method="POST" >
                        <div class="form-outline mb-4">
                        <div class="mb-3">
                          <input type="email" name="email" id="email" class="form-control" placeholder=" ادخل بريدك الالكتروني" style="font-size: 12px; text-align: center;" required />
                        </div>
                      </div>
                      <div class="text-center pt-1 mb-5 pb-1">
                        <button type="submit" name="resetPassword" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" style="font-size: 12px;" onclick="checkPasswordMatch()">
                        إرسال رابط إعادة تعيين كلمة المرور إلى بريد الكتروني
                        </button>
                        <br>
                      </div>
                      
                     
                        </form > ';
                        }
                        elseif(isset($_GET['v_cod']) && isset($_GET['email']) ){
                      $checkEmail = "SELECT Email, verification_id FROM users WHERE Email = '$_GET[email]' AND verification_id = '$_GET[v_cod]' ";
                      $result = mysqli_query($connection, $checkEmail);
    
                       if( mysqli_num_rows($result) > 0)

   { 
                     
                      echo '
                      

                    <form method = "post">
                      <h4 style="text-align: center; font-weight: bold; color: #162334;"> هل نسيت كلمة السر؟</h4>
                      <br>

                      <div class="form-outline mb-4">
                        <div class="mb-3">
                          <input type="password" name="password" id="forgot_password" class="form-control" placeholder=" أدخل كلمة السر الجديدة" style="font-size: 12px; text-align: center;" required />
                        </div>
                      </div>
                      <br>

                      <div class="form-outline mb-4">
                        <div class="mb-3">
                          <input type="password" name = "confirm_password" id="repeat_forgot_password" class="form-control" style="text-align: center; font-size: 12px;" placeholder=" أعد إدخال كلمة السر الجديدة" required />

                          <div class="invalid-feedback">كلمات السر غير متطابقة</div>
                        </div>
                      </div>
                      <div class="text-center pt-1 mb-5 pb-1">
                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" name = "newPassword" style="font-size: 12px;" onclick="checkPasswordMatch()">
                          تأكيد</a></button>
                        <br>
                      </div>
                      <br>

                    </form>
                    ';
                    }
                  else{
                    echo "انتهت صلاحيت الرابط";
                }
              }  
                    if(isset($_POST['newPassword'])){
                        $newpassword = $_POST['password'];
                        $newv_cod=bin2hex(random_bytes(16));
                        
                        $sql = "UPDATE users SET Password = '$newpassword', verification_id = '$newv_cod' WHERE Email = '$_GET[email]' AND verification_id = '$_GET[v_cod]'";
                        if(mysqli_query($connection, $sql)){
                            $sql = "SELECT * FROM users WHERE Password = '$newpassword' AND Email = '$_GET[email]' ";
                            $result = mysqli_query($connection, $sql);
                            
                
                            if(mysqli_num_rows($result) == 1) {
                                $user = mysqli_fetch_assoc($result);
                                // var_dump($user);
                                // تحقق من صحة كلمة المرور
                               
                                    $_SESSION['NationalNumber'] = $user['NationalNumber'];
                                    $_SESSION['password'] = $user['Password'];
                                    $_SESSION['userId'] = $user['UserID'];
                                    // echo "<br>";
                                    // var_dump($_SESSION);
                        
                                    header("Location: user_dashboard.php");
                                    exit;
                        
                    }}}
                
                  ?>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                  <div class="text-center">
                    <img src="../Images/maraqarLogo1.png" style="width: 300px; border-radius: 25px;" alt="logo">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </form>
  </section>
  <script>
    function checkPasswordMatch() {
      var password = document.getElementById("forgot_password");
      var confirmPassword = document.getElementById("repeat_forgot_password");
      if (password.value != confirmPassword.value) {
        confirmPassword.setCustomValidity("كلمات السر غير متطابقة");
      } else {
        confirmPassword.setCustomValidity("");
        window.location.href = "login_maraqar.html";
      }

    }
  </script>

</body>

</html>

<?php

  if(isset($_POST['resetPassword']) ){
    $email = $_POST['email'];
    $checkEmail = "SELECT Email, verification_id FROM users WHERE Email = '$email' ";
    $result = mysqli_query($connection, $checkEmail);
    

    if( mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        $v_cod = $user['verification_id'];
        $subject =  'إعادة تعين كلمة المرور';       
        $message = "
        <a href='http://localhost/php/newMaint/users/forgot_password_maraqar.php?email=$email&v_cod=$v_cod'>reset password</a>
        ";
        sendmail($email,$subject,$message );
        echo '
        <div class="alert alert-success mt-3"> 
     تم ارسال رابط لإعادة تعيين كلمة مرور إلى حسابك
     </div> 
     ';
    }else{
        echo '
        <div class="alert alert-warning mt-3">
        هذا بريد الكتروني غير مسجل لدينا
        </div> 
        ';
    }
}
        

?> 


