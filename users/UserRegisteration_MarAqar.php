<?php
session_start();

if(isset($_SESSION['email']) && !empty($_SESSION['email']) && isset($_SESSION['password']) && !empty($_SESSION['password']) ){
    header("Location:user_dashboard.php" );

}

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
    <script type="text/javascript" src="js/script.js"></script>
<!-- تضمين مكتبة jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- تضمين مكتبة AJAX -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajax-unobtrusive/3.2.6/jquery.unobtrusive-ajax.min.js"></script>
    <link rel="stylesheet" href="CSS/UserRegisteration.css">
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

                                    <form class="mx-1 mx-md-4" method="post"  id="Myform" >

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <div class="row" style="margin-right: 10px;">
                                                    <div class="col-md-11 mb-6">
                                                        <div class="form-outline">
                                                            <input type="text" id="FirstName" name="FirstName" class="form-control form-control-lg" placeholder="الاسم الأول" style="text-align: center; font-size: 12px;" required>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-outline flex-fill mb-0">
                                                <div class="row">
                                                    <div class="col-md-11 mb-6">
                                                        <div class="form-outline">

                                                            <input type="text" id="LastName" name="LastName" class="form-control form-control-lg" placeholder="الاسم الأخير" style="text-align: center; font-size: 12px;" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email"  id="email" name="Email" class="form-control" style="text-align: center; font-size: 12px;" placeholder="البريد الالكتروني" required />

                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">

                                                <input type="tel" id="Phone" name="Phone" class="form-control" placeholder="رقم الجوال" style="text-align: center; font-size: 12px;" required />

                                            </div>
                                        </div>



                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text"  class="form-control"id="NationalNumber" name="NationalNumber" onkeypress="return checkDigit(event)" placeholder="الرقم الوطني" style="text-align: center; font-size: 12px;" required />
                                                <!-- <script>
                                                    function checkDigit(event) {
                                                        var code = (event.which) ? event.which : event.keyCode;

                                                        if ((code < 48 || code > 57) && (code > 31)) {
                                                            return false;
                                                        }

                                                        return true;
                                                    }
                                                </script> -->
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

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="invalid_check" required>
                                            <label class="form-check-label" for="invalidcheck" style="font-size: 12px;">أوافق على كافة<a href="#" style="font-size: 12px;">شروط الاستخدام</a></label>
                                            <div class="invalid-feedback" style="font-size: 12px;">يجب عليك الموافقة على شروط الاستخدام</div>
                                        </div>
                                        <br>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4" id="regbtn">
                                        <button id="register" name="submit" type="submit" value="Submit" class="btn btn-lg btn-block fa-lg gradient-custom-2 mb-3" style="background-color:#162334; color: white; font-size: 16px;" onclick="registerUser()">إنشاء</button>                                        </div>


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
       
$(function () {
        $('form#Myform').on('submit', function (event) {
            $.ajax({
            type: 'post',
            url: 'proRegister.php',
            data: $('form').serialize(),
            beforeSend: function() {
                        $('#Myform').find('button').text('جاري الإرسال...');
            },
            success: function (data) {
                        $('form#Myform')[0].reset();
                        $('#Myform').find('button').text('إنشاء');
                        alert(data);
                // $("#data").html(data);
            }
            });
            event.preventDefault();
        });
        });
    </script>

</body>

</html>