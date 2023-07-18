<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <title>تسجيل الدخول</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/UserRegisterationMarAqar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- <script type="text/javascript" src="./js/script.js"></script> -->
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



                                        <form id="Mylogin" method="POST">
                                            <h4 style="text-align: center; font-weight: bold; color: #162334;">تسجيل الدخول</h4>
                                            <br>

                                            <div class="form-outline mb-4">
                                                <input type="email" id="login_email" name="email" class="form-control" placeholder="البريد الالكتروني" style="font-size: 12px; text-align: center;" />

                                            </div>
                                            <br>

                                            <div class="form-outline mb-4">
                                                <input type="password" name="password" id="form2Example22" class="form-control" style="text-align: center; font-size: 12px;" placeholder="كلمة السر" />

                                            </div>
                                            <br>

                                            <div class="text-center pt-1 mb-5 pb-1">
                                                <button type="submit" name="login" class="btn btn-success btn-block fa-lg gradient-custom-2 mb-3" style="font-size: 12px;">
                                                    تسجيل الدخول</button>
                                                <br>
                                                <!-- <a class="text-muted" href="forgot_password_maraqar.php" style="font-size: 12px;"> نسيت كلمة السر؟ </a> -->
                                            </div>

                                           

                                        </form>

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
        $(function() {
            $('form#Mylogin').on('submit', function(event) {
                $.ajax({
                    type: 'post',
                    url: 'handlingLoginAdmin.php',
                    data: $('form').serialize(),
                    beforeSend: function() {
                        $('#Mylogin').find('button').text('جاري الإرسال...');
                    },
                    success: function(data) {
                        $('form#Mylogin')[0].reset();
                        $('#Mylogin').find('button').text('تسجيل دخول');
                        // alert(data);
                        if (data.trim() === 'admins') {
                            alert("تم تسجيل الدخول بنجاح")
                            window.location.href = 'dashboard_admin.php';
                        } else if (data.trim() === "mainte") {
                            alert("تم تسجيل الدخول بنجاح")
                            window.location.href = 'dashboardMainte.php';
                        }else{
                            alert(data)
                        }
                    }
                });
                event.preventDefault();
            });
        });


        // if (data == "admin") {
        //     alert("تم تسجيل الدخول بنجاح")
        //     window.location.href = 'dashboard_admin.php';
        // } else if (data == "mainte") {
        //     alert("تم تسجيل الدخول بنجاح")
        //     window.location.href = 'test.php';
        // }else{
        //     window.location.href = 'test.php';

        // }
        // $("#data").html(data);

        //              }
        //         });
        //         event.preventDefault();
        //     });
        // }); 
    </script>

</body>

</html>