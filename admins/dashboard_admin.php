<?php

include "../db/dbConn.php";
session_start();

if (isset($_COOKIE['email']) && isset($_COOKIE['password']) && !empty($_COOKIE['password']) && !empty($_COOKIE['email']) && isset($_COOKIE['typeUsers']) && !empty($_COOKIE['typeUsers'])) {
  if ($_COOKIE['typeUsers'] == "admin") {

    // استرجاع البيانات من الكوكيز
    // تعيين بيانات المستخدم في الجلسة
    // var_dump($_COOKIE);
    $_SESSION['email'] = $_COOKIE['email'];
    $_SESSION['password'] = $_COOKIE['password'];
  } elseif ($_COOKIE['typeUsers'] == "mainte") {
    header("location:dashboardMainte.php");
  }
} else {
  header("Location:loginAdmin.php");
}



$sql = "SELECT mainte.*, users.*
        FROM mainte
        JOIN users ON mainte.UserIDF = users.UserID;
       
";
$result = mysqli_query($connection, $sql);


$sqlMainte = "SELECT *  FROM admins WHERE TypeUsers = 'mainte' ;
       
";
$resultMainte = mysqli_query($connection, $sqlMainte);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>لوحة تحكم الأدمن</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/progressbar.js@1.1.0/dist/progressbar.min.js"></script>
  <!-- Favicon-->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js'></script>


  <link rel="icon" type="image/x-icon" href="assets/Untitled.jpg" class="rounded-circle" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
  <link href="css/popup.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end  sidebar1" id="sidebar-wrapper" style="background-color: #162334;">

      <div class="sidebar-heading border-bottom" style="color: white;"><a href="#" class="d-flex align-items-center text-white text-decoration-none " id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="Images/Untitled.jpg" alt="hugenerd" width="50" height="50" class="rounded-circle">
          <h4 style="font-weight: bolder; font-size: 20px; text-align: right; font-style: italic;"> &nbsp;&nbsp;قائمة العمليات</h4>

        </a></div>
      <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light p-3 sidebar_item" href="#!" style="background-color: #162334; color: white;"><i class="bi bi-list-ul" style="color: white; font-size: 18px;">&nbsp;عرض الطلبات</i></a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 " href="mainteRegister.php" style=" background-color: #162334; color: white; "><i class="bi bi-person-add" style="font-size: 18px;">&nbsp;إضافة فني صيانة</i></a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 " href="logoutAdmin.php" style="background-color: #162334; color: white; "><i class="bi bi-box-arrow-right" style="font-size: 18px;">&nbsp;تسجيل الخروج</i></a>
        <!--
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 " href="#!" style="background-color: #162334; color: white;" >Events</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 " href="#!" style="background-color: #162334; color: white;" >Profile</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 " href="#!" style="background-color: #162334; color: white;" >Status</a>
                -->
      </div>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
      <!-- Top navigation-->
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container-fluid">
          <button class="btn btn-primary" id="sidebarToggle"><i class="bi bi-list" style="color: white; font-size: 18px; font-weight: bold;"></i></button>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
              <li class="nav-item active"><a class="nav-link" href="https://maraqar.com/" style=" font-weight: bolder;">الرئيسية</a></li>
              <li class="nav-item"><a class="nav-link" href="mailto:aboodsulayman1998@gmail.com" style=" font-weight: bolder;">بريد الموقع</a></li>
              <!--
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">Action</a>
                                        <a class="dropdown-item" href="#!">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!">Something else here</a>
                                    </div>
                                </li>
                                -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- Page content-->
      <div class="container-fluid">
        <div class="col py-3">
          <main role="main" class="col-md-12 ml-sm-auto col-lg-10 px-4">
            <h3>الطلبات</h3>
            <hr>
            <div class="table-responsive my-custom-scrollbar  rounded-4  shadow p-8 mb-5 bg-body  " id="scroll_table" style="overflow-y: scroll; max-height: 75vh; ">

              <table class="table table-bordered table-striped table-hover  ">
                <thead class="table-primary text-center">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم المشروع</th>
                    <th scope="col">العمليات</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  if ($result->num_rows > 0) {
                    $count = 1;
                    while ($row = $result->fetch_assoc()) {
                      $row_json = json_encode($row);
                  ?>

                      <tr>
                        <th scope="row" class="align-middle text-center"><?php echo $count; ?></th>
                        <td class="align-middle text-center"><?php echo $row["ProjectName"]; ?></td>
                        <td class="align-middle">
                          <div class="d-flex flex-column align-items-center ">
                            <button type="button" onclick="openPopup('<?php echo htmlspecialchars($row_json, ENT_QUOTES, 'UTF-8'); ?>')" class="btn btn-outline-primary btn-sm me-2 mb-3">
                              <i class="bi bi-eye""></i> عرض الطلب
                            </button>

                            <?php if ($row["Status"] == "تم الانتهاء") :

                              $sqlRating = "SELECT * from rating where MainteId = '$row[ProjectId]' AND StatusRating = 1 ";
                              $resultRating = mysqli_query($connection, $sqlRating);
                              if (mysqli_num_rows($resultRating) > 0) :
                                $rowRating = $resultRating->fetch_assoc();
                                $rowRating_json = json_encode($rowRating);
                            ?>
                          <button type=" button" onclick="openPopupRatingShow('<?php echo htmlspecialchars($rowRating_json, ENT_QUOTES, 'UTF-8'); ?>')" class="btn btn-outline-success btn-sm me-2 mb-3">
                                <i class="bi bi-eye""></i> عرض التقييم
                          </button>
                      <?php endif; ?>
                      <?php endif; ?>

                      <button type=" button" onclick="downloadhtmlnew('<?php echo htmlspecialchars($row_json, ENT_QUOTES, 'UTF-8'); ?>')" class="btn btn-outline-success btn-sm me-2 mb-3">
                                  <i class="bi bi-download"></i> تحميل الطلب
                            </button>

                            <button type="button" onclick="deleteReq('<?php echo htmlspecialchars($row_json, ENT_QUOTES, 'UTF-8'); ?>')" class="btn btn-outline-danger btn-sm me-2 mb-2">
                              <i class="bi bi-trash"></i> حذف الطلب
                            </button>
                          </div>
                        </td>
                      </tr>
                  <?php
                      $count++;
                    }
                  }

                  ?>

                </tbody>
              </table>
            </div>
          </main>
        </div>
      </div>


    </div>
  </div>

  <div id="popup" class="popup" dir="rtl">
    <div class="popup-content">
      <!-- <span class="close" onclick="closePopup()">&times;</span> -->
      <div class="container ">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11" style="min-width:100%; height:100%">
            <div class="card text-black p-3" style="border-radius: 25px">
              <div class="container mt-5">
                <div class="row mb-6">
                  <div class="col-md-12 ">
                    <img src="../Images/maraqarLogo1.png" alt="hugenerd" width="100" height="150" class=" img-fluid" style="margin-top: -10px;">

                  </div>
                  <h2 style="text-align: left; margin-top: -50px;">معلومات طلب الصيانة</h4>
                </div>
                <br>

              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="inputName" class="form-label" style="font-size:16px ;">اسم المشروع</label>
                  <div id="par1" class="form-control fs-5 font-italic"> </div>
                </div>

                <div class="col-md-6">
                  <label for="inputName" class="form-label" style="font-size:16px ;"> الحي</label>
                  <div id="par2" class="form-control fs-5 font-italic"> </div>

                </div>
                <div class="col-md-6">
                  <label for="inputName" class="form-label" style="font-size:16px ;"> رقم الوحدة</label>
                  <div id="par3" class="form-control fs-5 font-italic"> </div>

                </div>
                <div class="col-md-6">
                  <label for="inputName" class="form-label" style="font-size:16px ;"> رقم القطعة</label>
                  <div id="par4" class="form-control fs-5 font-italic"> </div>

                </div>
                <div class="col-md-6">
                  <label for="inputName" class="form-label" style="font-size:16px ;"> رقم الطابق</label>
                  <div id="par5" class="form-control fs-5 font-italic"> </div>
                </div>
                <div class="col-md-6">
                  <label for="inputDate" class="form-label" style="font-size:16px ;">تاريخ العقد</label>
                  <div id="par6" class="form-control fs-5 font-italic"> </div>

                </div>
                <div class="col-md-6">
                  <label for="inputDate" class="form-label" style="font-size:16px ;">نوع الطلب</label>
                  <div id="par7" class="form-control fs-5 font-italic"> </div>
                </div>


                <div class="col-md-6">
                  <label for="inputCategory" class="form-label" style="font-size: 16px;">حالة الطلب</label>
                  <div id="par9" class="form-control fs-5 font-italic"> </div>
                </div>

                <div class="col-md-6">
                  <label for="inputDate" class="form-label" style="font-size:16px ;">عدد زيارات فني الصيانة</label>
                  <div id="par16" class="form-control fs-5 font-italic"> </div>
                </div>

                <div class="col-md-6">
                  <label for="inputDate" class="form-label" style="font-size:16px ;">تاريخ ارسال الطلب</label>
                  <div id="par10" class="form-control fs-5 font-italic"> </div>
                </div>

                <div class="col-md-6">
                  <label for="inputDate" class="form-label overflow-auto" style="font-size:16px ;"> ملاحظات فني الصيانة </label>
                  <div id="par19" class="form-control fs-5 font-italic overflow-auto"> </div>
                </div>

                <div class="col-md-6">
                  <label for="inputDate" class="form-label" style="font-size:16px ;"> كود العميل </label>
                  <div id="par18" class="form-control fs-5 font-italic"> </div>
                </div>

                <div class="col-md-6 mt-2">
                  <label for="inputDescription" class="form-label" style="font-size:16px ;">وصف المشكلة</label>
                  <div id="par8" class="form-control fs-5 font-italic overflow-auto"> </div>
                </div>

                <div class="col-md-6 mt-2">
                  <label for="inputDescription" class="form-label" style="font-size:16px ;"> سبب الرفض في حال وجوده </label>
                  <div id="par21" class="form-control fs-5 font-italic overflow-auto"> </div>
                </div>

                <div class="col-md-6 mt-2">
                  <label for="inputDescription" class="form-label" style="font-size:16px ;"> اسم الفني الذي تم تعينه لاصلاح الطلب </label>
                  <div id="par22" class="form-control fs-5 font-italic overflow-auto"> </div>
                </div>

                <h3>معلومات المستخدم</h3>

                <div class="col-md-6">
                  <label for="inputDate" class="form-label" style="font-size:16px ;"> اسم مقدم الطلب </label>
                  <div id="par11" class="form-control fs-5 font-italic"> </div>
                </div>

                <div class="col-md-6">
                  <label for="inputDate" class="form-label" style="font-size:16px ;"> الرقم الوطني </label>
                  <div id="par12" class="form-control fs-5 font-italic"> </div>
                </div>

                <div class="col-md-6">
                  <label for="inputDate" class="form-label" style="font-size:16px ;"> رقم الهاتف </label>
                  <div id="par13" class="form-control fs-5 font-italic"> </div>
                </div>

                <div class="col-md-6">
                  <label for="inputDate" class="form-label" style="font-size:16px ;"> البريد الالكتروني </label>
                  <div id="par14" class="form-control fs-5 font-italic"> </div>
                </div>



              </div>
            </div>




            <div class="row mb-3 ">
              <div class="col-md-6">
                <h4 class="mt-3"> تعديل حالة الطلب </h4>
                <select name="status" id="status" class="form-control mt-3">
                  <option id="selectedOption" disabled selected>اختر حالة الطلب</option>
                  <option value="تم الارسال">تم الارسال</option>
                  <option value="تم الاستلام">تم الاستلام</option>
                </select>
                <button type="button" id="par15" class="btn btn-primary btn-block mt-2" style="font-size: 12px; border-radius: 10px;">
                  <span class="glyphicon glyphicon-edit"></span>
                  تعديل حالة الطلب
                </button>

              </div>
              <div class="col-md-6">
              <h4 class="mt-3"> اختيار الفني</h4>

                <?php
                if (mysqli_num_rows($resultMainte) > 0) :
                ?>
                  <select id="SelectMainte" class="form-control mt-3" name="userNames">
                    <?php
                    while ($row = mysqli_fetch_assoc($resultMainte)) :
                      // استخدام القيمة المسترجعة لإنشاء خيار في القائمة المنسدلة
                      $userName = $row['UserName'];
                      $idName = $row['Id'];
                    ?>
                      <option value="<?php echo $idName; ?>"> <?php echo $userName; ?> </option>;
                    <?php endwhile; ?>
                  </select>
                <?php else :
                  echo "لا توجد نتائج.";
                endif;

                ?>
                <button type="button" id="par20" class="btn btn-primary btn-block mt-2" style="font-size: 12px; border-radius: 10px;">
                  <span class="glyphicon glyphicon-edit"></span>
                  تعين الفني
                </button>
              </div>
            </div>
            <div class="col-md-6">
              <textarea name="rejectionLetter" id="rejectionLetter" class="form-control mt-3" rows="3" placeholder="ادخل رسالة الرفض هنا"></textarea>

              <button type="button" id="reject" class="btn btn-danger btn-block" style="font-size: 12px; border-radius: 10px;">
                <span class="glyphicon glyphicon-edit"></span>
                رفض الطلب
              </button>
            </div>


            <div class="row mb-3">
              <div class="col-md-12 ">
                <label for="inputImage" class="form-label" style="font-size:16px ;">صور مرفقة</label>
                <!-- <input type="file" class="form-control" id="inputImage"> -->
                <div class="">
                  <div id="img12" class="images"></div>
                </div>

                <div id="popup1">
                  <!-- <span class="close" onclick="closePopup()">&times;</span> -->
                  <span id="closeBtn">&times;</span>
                  <img id="popupImage" src="">
                </div>
              </div>
              <button type="button" onclick="closePopup()" class="btn btn-danger close" style="font-size:16px ;">إغلاق</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- show rating -->
  <div id="popupRatingShow" class="popupRatingShow" dir="rtl">

    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-8">
          <div class="card text-black " style="border-radius: 25px;">
            <div class="card">
              <div class="card-body p-md-5">
                <div class="text-right">
                  <i class="far fa-file-alt fa-4x mb-3 text-primary"></i>
                  <div class="col-sm-6">
                    <img src="./Images/Untitled.jpg" class="rounded-circle" style="width: 100px; height: 100px;">
                  </div>
                  <p style="text-align: left;">
                    <strong>رأيك يهمنا</strong>
                  </p>

                </div>

                <hr />
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="inputDate" class="form-label" style="font-size:16px ;"> سرعة الرد </label>

                    <div id="response_speed_Show" class="form-control form-check mb-2"></div>
                  </div>

                  <div class="col-md-6">
                    <label for="inputDate" class=" form-label" style="font-size:16px ;"> تعامل فني الصيانة </label>

                    <div id="maitenance_behavior_Show" class="form-control form-check mb-2"></div>
                  </div>

                  <div class="col-md-6">
                    <label for="inputDate" class="form-label" style="font-size:16px ;"> جودة خدمة الصيانة </label>

                    <div id="maitenance_service_speed_Show" class="form-control form-check mb-2"></div>
                  </div>

                  <div class="col-md-6">
                    <label for="inputDate" class="form-label" style="font-size:16px ;"> سرعة تنفيذ خدمة الصيانة </label>

                    <div id="maitenance_service_execution_speed_Show" class="form-control form-check mb-2"></div>
                  </div>

                  <div class="col-md-6">
                    <label for="inputDate" class="form-label" style="font-size:16px ;"> توافق الخدمة مع الطلب </label>

                    <div id="service_and_request" class="form-control form-check mb-2"></div>
                  </div>

                  <div class="col-md-6">
                    <label for="inputDate" class="form-label" style="font-size:16px ;"> ملاحظتك </label>

                    <div id="opinionAreaShow" class="form-control form-check mb-2"></div>
                  </div>


                </div>


              </div>
            </div>
            <button type="button" onclick="closePopupRatingShow()" class="btn btn-danger close" style="font-size:16px ;">إغلاق</button>
          </div>
        </div>

      </div>
    </div>
  </div>






  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script>
    src = 'https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js'
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script src="./js/fileJsAdmin.js"></script>
  <!-- <script src="./js/pdfDD.js"></script> -->
</body>

</html>