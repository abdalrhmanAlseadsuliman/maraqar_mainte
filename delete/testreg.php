<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <title>إنشاء حساب</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" href="CSS/UserRegisteration.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <script src="../Javascript/code.jquery.com_jquery-3.6.0.min.js"></script>

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
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4" style="color: #162334;">إنشاء حساب</p>
                                    <form class="mx-1 mx-md-4" method="POST" id="Myform">
                                    <div class="d-flex flex-row align-items-center mb-4"> <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <div class="row" style="margin-right: 10px;">
                                                    <div class="col-md-11 mb-6">
                                                        <div class="form-outline"> <input type="text" id="FirstName" name="FirstName" class="form-control form-control-lg" placeholder="الاسم الأول" style="text-align: center; font-size: 12px;" required> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-outline flex-fill mb-0">
                                                <div class="row">
                                                    <div class="col-md-11 mb-6">
                                                        <div class="form-outline"> <input type="text" id="LastName" name="LastName" class="form-control form-control-lg" placeholder="الاسم الأخير" style="text-align: center; font-size: 12px;" required> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4"> <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0"> <input type="email" id="email" name="Email" class="form-control" style="text-align: center; font-size: 12px;" placeholder="البريد الالكتروني" required /> </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text"  class="form-control"id="NationalNumber" name="NationalNumber" onkeypress="return checkDigit(event)" placeholder="الرقم الوطني" style="text-align: center; font-size: 12px;" required />
                                                
                                            </div>
                                        </div>


                                        <div class="d-flex flex-row align-items-center mb-4"> <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0"> <input type="tel" id="Phone" name="Phone" class="form-control" placeholder="رقم الجوال" style="text-align: center; font-size: 12px;" required /> </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4"> <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0"> <input type="password" id="password" name="Password" class="form-control" style="text-align: center; font-size: 12px;" placeholder="كلمة المرور" required /> </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4"> <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0"> <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" style="text-align: center; font-size: 12px;" placeholder="تأكيد كلمة المرور" required /> </div>
                                        </div>
                                        <div class="form-check d-flex justify-content-center mb-5"> <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" checked required> <label class="form-check-label" for="form2Example3" style="color: #162334;"> أوافق على الشروط والأحكام </label> </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4"> 
                                            <input name="submit" type="submit" value="Submit" class="btn btn-primary btn-lg" style="background-color: #162334;">إنشاء</inpu>
                                         </div>
                                       
                                    </form>
                                    <div id="data"></div>
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
            success: function (data) {
                        alert("sdsds");
                $("#data").html(data);
            }
            });
            event.preventDefault();
        });
        });
</script>
</body>

</html>