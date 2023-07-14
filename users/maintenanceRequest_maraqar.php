<?php
// include "./processMainte.php";
session_start();
var_dump($_SESSION);
?>

<!DOCTYPE html>
<html>

<head>
  <title>طلب صيانة</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <link rel="stylesheet" href="CSS/UserRegisteration.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">




</head>


<body dir="rtl">
  <section class="vh-100" style="background-image:url(../Images/slider1.png);">

    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4" style="color: #162334;">إنشاء طلب صيانة</p>

                  <form class="mx-1 mx-md-4" id='mainteform' method="POST" enctype="multipart/form-data">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <div class="row">
                          <div class="col-md-12 mb-6">
                            <div class="form-outline">
                              <input type="text" id="project_name" name="project_name" class="form-control form-control-lg" placeholder="اسم المشروع" style="text-align: center; font-size: 12px;" required>

                            </div>
                          </div>
                        </div>
                      </div>


                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="neighborhood" name="neighborhood" class="form-control" style="text-align: center; font-size: 12px;" placeholder="الحي" required />

                      </div>
                    </div>


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">

                        <input type="number" id="piece_number" name="piece_number" class="form-control" placeholder="رقم القطعة" style="text-align: center; font-size: 12px;" required />

                      </div>
                    </div>


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">

                        <input type="number" id="unit_number" name="unit_number" class="form-control" placeholder="رقم الوحدة" style="text-align: center; font-size: 12px;" required />

                      </div>
                    </div>




                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">

                        <input type="number" id="floor_number" name="floor_number" class="form-control" placeholder="رقم الطابق" style="text-align: center; font-size: 12px;" required />

                      </div>
                    </div>


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <!-- <p style="text-align: right; font-size: 12px; font-weight: bold;">تاريخ العقد</p> -->
                        <input type="text" id="contract_date" class="form-control" name="contract_date" placeholder="تاريخ العقد" onfocus="(this.type='date')" style="text-align: center; font-size: 12px;" required />
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <select id="request_type" name="request_type" class="form-control" style="text-align: center; font-size: 12px;" required>
                          <option value="" disabled selected>نوع الطلب</option>
                          <option value="option1">خيار 1</option>
                          <option value="option2">خيار 2</option>
                          <option value="option3">خيار 3</option>
                        </select>

                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <textarea class="form-control" id="request_desc" name="request_description" style="font-size: 12px; text-align: right;" placeholder="وصف الطلب" required></textarea>

                      </div>
                    </div>

                    <div class="mb-3">
                      <p for="formFileMultiple" style="text-align: right; font-size: 12px; font-weight: bold;">اختر ملفات</p>
                      <input type="file" class="form-control" name="imageFile[]" id="img" multiple>
                    </div>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4" id="resetbtn">

                      <button type="button" class=" btn btn-danger btn-lg">محو البيانات
                        <script>
                          $('form').get(0).reset() // or $('form')[0].reset()
                        </script>
                      </button>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4" id="regbtn">
                      <button id="register" type="submit" class="btn btn-lg btn-block fa-lg gradient-custom-2 mb-3" style=" background-color:#162334; color: white; font-size: 16px;"> إرسال الطلب</button>
                    </div>

                  </form>

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
    $(function() {
      $('form#mainteform').on('submit', function(event) {
        event.preventDefault();

        var formData = new FormData($('form#mainteform')[0]);

        $.ajax({
          type: 'post',
          url: 'processMainte.php',
          data: formData,
          processData: false,
          contentType: false,
          beforeSend: function() {
            $('#mainteform').find('button').text('جاري الإرسال...');
          },
          success: function(data) {
            $('form#mainteform')[0].reset();
            $('#mainteform').find('button').text('ارسال الطلب');
            alert(data);
          }
        });
      });
    });
  </script>
</body>

</html>