<?php
session_start();
var_dump($_POST);
// if(isset($_SESSION['email']) && !empty($_SESSION['email']) && isset($_SESSION['password']) && !empty($_SESSION['password']) ){
//     header("Location:user_dashboard.php" );

// }
// if (isset($_COOKIE['email']) && isset($_COOKIE['password']) && !empty($_COOKIE['password']) && !empty($_COOKIE['email']) && isset($_COOKIE['typeUsers']) && !empty($_COOKIE['typeUsers'])  ) {
//     if( $_COOKIE['typeUsers'] == "admin"){
  
//       // استرجاع البيانات من الكوكيز
//       // تعيين بيانات المستخدم في الجلسة
//       var_dump($_COOKIE);
//       $_SESSION['email'] = $_COOKIE['email'];
//       $_SESSION['password'] = $_COOKIE['password'];
//     }else {
//       header("Location:https://maraqar.com/" );    
//     }
// }
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <title>إنشاء حساب</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- تضمين مكتبة jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- تضمين مكتبة AJAX -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajax-unobtrusive/3.2.6/jquery.unobtrusive-ajax.min.js"></script>
    <!-- <link rel="stylesheet" href="CSS/UserRegisteration.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">


</head>


<body>


    <section class="vh-100" style="background-image:url(../Images/slider1.png);">

        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4" style="color: #162334;">
                                        إنشاء حساب</p>

                                    <form class="mx-1 mx-md-4"   id="Myform" >

                                        <div class="d-flex flex-row  align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <div class="row" >
                                                    <div class="col-md-12 mb-6">
                                                        <div class="form-outline">
                                                            <input type="text" id="userName" name="userName" class="form-control form-control-lg" placeholder="اسم فني الصيانة" style="text-align: center; font-size: 12px;" required>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email"  id="email" name="email" class="form-control" style="text-align: center; font-size: 12px;" placeholder="البريد الالكتروني" required />

                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <div class="mb-3">
                                                    <input type="password" id="password" name="password" class="form-control" style="text-align: center; font-size: 12px;" placeholder="كلمة السر" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <div class="mb-3">
                                                    <input type="password"id="confirmPassword" name="confirmPassword" class="form-control" placeholder="أعد كتابة كلمة السر" style="text-align: center; font-size: 12px;" required />
                                                </div>
                                                <div class="invalid-feedback">كلمات السر غير متطابقة</div>
                                                <!--    <label class="form-label" for="form3Example4cd">Repeat your password</label> -->
                                            </div>
                                        </div>

                                        
                                        <br>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4" id="regbtn">                                        
                                            <button type="submit" id="registerForm" name="submit"   class="btn btn-lg btn-block fa-lg gradient-custom-2 mb-3" style="background-color:#162334; color: white; font-size: 16px;" onclick="handlingRegister(JSON.stringify($('#Myform').serialize()))">إنشاء</button>
                                        </div>


                                    </form>
                                    <!-- <div id="data"></div> -->

                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-6" id="logo" style="text-align: left; width: 400px;">

                                    <img src="../Images/maraqarLogo1.png" id="imglogo" class="img-fluid" alt="Sample image" style="border-radius: 20px;">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    // $(function() {
    //   $('form#Myform').on('submit', function(event) {
    //     event.preventDefault();

    //     var formData = new FormData($('form#Myform')[0]);

    //     $.ajax({
    //       type: 'post',
    //       url: 'handlingLoginAdmin.php',
    //       data: formData,
    //       processData: false,
    //       contentType: false,
    //       beforeSend: function() {
    //         $('#Myform').find('button').text('جاري الإرسال...');
    //       },
    //       success: function(data) {
    //         $('form#Myform')[0].reset();
    //         $('#Myform').find('button').text('ارسال الطلب');
    //         alert(data);
    //       }
    //     });
    //   });
    // });

function handlingRegister(datafile){
  $('#Myform').click(function(event) {
    event.preventDefault(); // منع السلوك الافتراضي للنقر
});

    // القيام بأي شيء آخر تحتاج إلى القيام به هنا
var rowObj = JSON.parse(datafile);
// var jsonData = JSON.stringify(rowObj);
// console.log( typeof(rowObj))
// console.log( rowObj)

// console.log(jsonData)
// console.log( typeof(jsonData))

// console.log( typeof(datafile))
// console.log( datafile)

$.ajax({
  type: 'POST',
  url: 'handlingLoginAdmin.php',
  data: {json: rowObj,
    submitType:"register"},
  success: function(data) {
    // window.location.href = 'dashboard_admin.php';
    alert(data);
  },
});


}

  </script>
    <!-- <script type="text/javascript" src="js/javascriptfile.js"></script> -->

</body>

</html>