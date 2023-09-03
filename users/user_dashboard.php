<?php

include "../db/dbConn.php";
session_start();
// var_dump($_COOKIE);
if (isset($_COOKIE['typeUsers']) && !empty($_COOKIE['typeUsers']) && $_COOKIE['typeUsers'] == 'mainte') {
  header("Location:../admins/dashboardMainte.php");
} elseif (isset($_COOKIE['typeUsers']) && !empty($_COOKIE['typeUsers']) && $_COOKIE['typeUsers'] == 'admin') {
  header("Location:../admins/dashboard_admin.php");
}

if (isset($_COOKIE['email']) && isset($_COOKIE['password']) && !empty($_COOKIE['password']) && !empty($_COOKIE['email']) && isset($_COOKIE['userId']) && !empty($_COOKIE['userId'])) {


  // استرجاع البيانات من الكوكيز
  // تعيين بيانات المستخدم في الجلسة
  // var_dump($_COOKIE);
  $_SESSION['email'] = $_COOKIE['email'];
  $_SESSION['password'] = $_COOKIE['password'];
} else {
  header("Location:login_maraqar.php");
}



$sql = "SELECT mainte.*, users.*
        FROM mainte
        JOIN users ON mainte.UserIDF = users.UserID  WHERE users.Email = '$_SESSION[email]';
       
";
$result = mysqli_query($connection, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>لوحة تحكم</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/progressbar.js@1.1.0/dist/progressbar.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

  <link rel="stylesheet" href="./css/stylesUser.css">
  <link rel="stylesheet" href="./css/userPopStyle.css">
  <!-- Favicon-->

  <link rel="icon" type="image/x-icon" href="assets/Untitled.jpg" class="rounded-circle" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end" id="sidebar-wrapper" style="background-color: #162334;">

      <div class="sidebar-heading border-bottom" style="color: white;"><a href="#" class="d-flex align-items-center text-white text-decoration-none " id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="Images/logoM.jpg" alt="hugenerd" width="50" height="50" class="rounded-circle">
          <h4 style="font-weight: bolder; font-size: 20px; text-align: right; font-style: italic;"> &nbsp;&nbsp;قائمة العمليات</h4>

        </a></div>
      <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light p-3 sidebar_item" href="user_dashboard.php" style="background-color: #162334; color: white;"><i class="bi bi-list-ul" style="color: white; font-size: 18px;">&nbsp;عرض الطلبات</i></a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 " href="maintenanceRequest_maraqar.php" style=" background-color: #162334; color: white; "><i class="bi bi-person-add" style="font-size: 18px;">&nbsp;تقديم طلب جديد</i></a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 " href="logout.php" style="background-color: #162334; color: white; "><i class="bi bi-box-arrow-right" style="font-size: 18px;">&nbsp;تسجيل الخروج</i></a>
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
              <li class="nav-item"><a class="nav-link" href="mailto:aboodsulayman1998@gmail.com
" style=" font-weight: bolder;">بريد الموقع</a></li>
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
              <?php
              $result = mysqli_query($connection, $sql);

              ?>
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
                        <td class="align-middle ">
                          <div class="d-flex flex-column align-items-center ">

                            <button type="button" onclick="openPopup('<?php echo htmlspecialchars($row_json, ENT_QUOTES, 'UTF-8'); ?>')" class="btn btn-outline-primary btn-sm me-2 mb-3">
                              <i class="bi bi-eye"></i> عرض الطلب
                            </button>
                            <?php if ($row["Status"] == "تم الانتهاء") : ?>
                              <?php

                              $sqlRating = "SELECT * from rating where MainteId = '$row[ProjectId]' AND StatusRating = 1 ";
                              $resultRating = mysqli_query($connection, $sqlRating);
                              if (mysqli_num_rows($resultRating) > 0) :
                                $rowRating = $resultRating->fetch_assoc();
                                $rowRating_json = json_encode($rowRating);
                              ?>
                                <button type=" button" onclick="openPopupRatingShow('<?php echo htmlspecialchars($rowRating_json, ENT_QUOTES, 'UTF-8'); ?>')" class="btn btn-outline-primary btn-sm me-2 mb-3">
                                  <i class="bi bi-eye""></i> عرض التقيم
                                </button>

                              <?php else : ?>
                                <button type=" button" onclick="openPopupRating('<?php echo htmlspecialchars($row_json, ENT_QUOTES, 'UTF-8'); ?>')" class="btn btn-outline-primary btn-sm me-2 mb-3">
                                    <i class="bi bi-star"></i> إضافة تقيم
                                </button>
                              <?php endif ?>

                            <?php endif ?>
                            <button type="button" onclick="downloadhtmlnew('<?php echo htmlspecialchars($row_json, ENT_QUOTES, 'UTF-8'); ?>')" class="btn btn-outline-success btn-sm me-2 mb-3">
                              <i class="bi bi-download"></i>تحميل الطلب
                            </button>
                          </div>
                          <!-- <div id="progress-bar"></div> -->


                        </td>
                      </tr>

            </div>
        <?php
                      $count++;
                    }
                  }
        ?>
        </tbody>
        </table>

        </div>
      </div>
    </div>
  </div>
  <div id="popup" class="popup" dir="rtl">
    <div class="popup-content">
      <!-- <span class="close" onclick="closePopup()">&times;</span> -->
      <div class="container ">
        <div class="row d-flex justify-content-center align-items-center ">
          <div class="col-lg-12 col-xl-11" style="min-width:100%;">
            <div class="card text-black p-3 " style="border-radius: 25px;">
              <div class="container mt-2">
                <div class="row mb-12">
                  <div class="col-md-3 text-center">
                    <img src="./Images/logoM.jpg" class="rounded-circle" style="width: 100px; height: 100px;">
                  </div>
                  <div class="col-md-6 mt-2">

                    <h2 style = "font-size: 22px !important" >معلومات طلب الصيانة</h4>

                  </div>
                </div>
                <br>

              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="inputName" class="form-label" style="font-size:16px ;">اسم المشروع</label>
                  <!-- <input type="text" class="form-control" id="inputName" placeholder=""> -->
                  <div id="par1" class="form-control fs-5 font-italic"> </div>
                </div>

                <div class="col-md-6">
                  <label for="inputName" class="form-label" style="font-size:16px ;"> الحي</label>
                  <!-- <input type="text" class="form-control" id="inputName" placeholder=""> -->
                  <div id="par2" class="form-control fs-5 font-italic"> </div>

                </div>
                <div class="col-md-6">
                  <label for="inputName" class="form-label" style="font-size:16px ;"> رقم الوحدة</label>
                  <!-- <input type="text" class="form-control" id="inputName" placeholder=""> -->
                  <div id="par3" class="form-control fs-5 font-italic"> </div>

                </div>
                <div class="col-md-6">
                  <label for="inputName" class="form-label" style="font-size:16px ;"> رقم القطعة</label>
                  <!-- <input type="text" class="form-control" id="inputName" placeholder=""> -->
                  <div id="par4" class="form-control fs-5 font-italic"> </div>

                </div>
                <div class="col-md-6">
                  <label for="inputName" class="form-label" style="font-size:16px ;"> رقم الطابق</label>
                  <!-- <input type="text" class="form-control" id="inputName" placeholder=""> -->
                  <div id="par5" class="form-control fs-5 font-italic"> </div>
                </div>
                <div class="col-md-6">
                  <label for="inputDate" class="form-label" style="font-size:16px ;">تاريخ العقد</label>
                  <!-- <input type="date" class="form-control" id="inputDate" aria-selected="true"> -->
                  <div id="par6" class="form-control fs-5 font-italic"> </div>

                </div>
                <div class="col-md-6">
                  <label for="inputDate" class="form-label" style="font-size:16px ;">نوع الطلب</label>
                  <!-- <input type="date" class="form-control" id="inputDate" aria-selected="true"> -->
                  <div id="par7" class="form-control fs-5 font-italic"> </div>
                </div>


                <div class="col-md-6">
                  <label for="inputCategory" class="form-label" style="font-size: 16px;">حالة الطلب</label>
                  <div id="par9" class="form-control fs-5 font-italic"> </div>
                </div>

                <div class="col-md-6">
                  <label for="inputDate" class="form-label" style="font-size:16px ;">عدد زيارات فني الصيانة</label>
                  <!-- <input type="date" class="form-control" id="inputDate" aria-selected="true"> -->
                  <div id="par16" class="form-control fs-5 font-italic"> </div>
                </div>

                <div class="col-md-6">
                  <label for="inputDate" class="form-label" style="font-size:16px ;">تاريخ ارسال الطلاب</label>
                  <!-- <input type="date" class="form-control" id="inputDate" aria-selected="true"> -->
                  <div id="par10" class="form-control fs-5 font-italic"> </div>
                </div>

                <div class="col-md-6">
                  <label for="inputDate" class="form-label" style="font-size:16px ;"> كود الطلب </label>
                  <!-- <input type="date" class="form-control" id="inputDate" aria-selected="true"> -->
                  <div id="par21" class="form-control fs-5 font-italic"> </div>
                </div>

                <div class="col-md-6">
                  <label for="inputDate" class="form-label" style="font-size:16px ;"> رسالة الرفض في حال وجودها </label>
                  <!-- <input type="date" class="form-control" id="inputDate" aria-selected="true"> -->
                  <div id="par22" class="form-control fs-5 font-italic"> </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12">
                    <label for="inputDescription" class="form-label" style="font-size:16px ;">الوصف</label>
                    <!-- <textarea class="form-control" id="inputDescription" rows="3"></textarea> -->
                    <div id="par8" class="form-control fs-5 font-italic"> </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12">
                    <label for="inputImage" class="form-label" style="font-size:16px ;">صور مرفقة</label>
                    <!-- <input type="file" class="form-control" id="inputImage"> -->
                    <div class="">
                      <div id="img12" class="images imgMainte"></div>
                    </div>

                    <div id="popup1">
                      <!-- <span class="close" onclick="closePopup()">&times;</span> -->
                      <span id="closeBtn">&times;</span>
                      <img id="popupImage" src="">
                    </div>
                  </div>
                </div>
              </div>
              <button type="button" onclick="closePopup()" class="btn btn-danger close" style="font-size:16px ;">إغلاق</button>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- popupRating  -->

  <div id="popupRating" class="popupRating" dir="rtl">

    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-8">
          <div class="card text-black " style="border-radius: 25px;">
            <div class="card">
              <div class="card-body p-md-5">
                <div class="text-right">
                  <div class="row">
                    <div class="col-sm-3">
                      <img src="./Images/logoM.jpg" class="rounded-circle" style="width: 100px; height: 100px; float: right;">
                    </div>
                    <div class="col-sm-6">
                      <p style="text-align: center;">
                        <strong>رأيك يهمنا</strong>
                      </p>
                      <p style="text-align: center;">
                        هل لديك أفكار أو آراء لتحسين الخدمة؟
                        <strong>قم بتقييم خدمتنا</strong>
                      </p>
                    </div>

                  </div>
                </div>

                <hr />

                <form class="px-4" id="MyRating" >
                  <p class="text-center"><strong>سرعة الرد</strong></p>

                  <div class="form-check mb-2">
                    <input class="" type="radio" name="response_speed" id="radio2Example1" value="ممتازة">
                    <label class="form-check-label" for="radio2Example1">
                      ممتازة
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="" type="radio" name="response_speed" id="radio2Example2" value="جيدة" />
                    <label class="form-check-label" for="radio2Example2">
                      جيدة
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="" type="radio" name="response_speed" id="radio2Example3" value="متوسطة" />
                    <label class="form-check-label" for="radio2Example3">
                      متوسطة
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="" type="radio" name="response_speed" id="radio2Example4" value="سيئة" />
                    <label class="form-check-label" for="radio2Example4">
                      سيئة
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="" type="radio" name="response_speed" id="radio2Example5" value="سيئة جداً" />
                    <label class="form-check-label" for="radio2Example5">
                      سيئة جداً
                    </label>
                  </div>
                  <hr />
                  <p class="text-center"><strong>تعامل فني الصيانة</strong></p>

                  <div class="form-check mb-2">
                    <input class="" type="radio" name="maitenance_behavior" id="radio2Example6" value="ممتاز">
                    <label class="form-check-label" for="radio2Example6">
                      ممتاز
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="" type="radio" name="maitenance_behavior" id="radio2Example7" value="جيد" />
                    <label class="form-check-label" for="radio2Example7">
                      جيد
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="" type="radio" name="maitenance_behavior" id="radio2Example8" value="متوسط" />
                    <label class="form-check-label" for="radio2Example8">
                      متوسط
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="" type="radio" name="maitenance_behavior" id="radio2Example9" value="سيء" />
                    <label class="form-check-label" for="radio2Example9">
                      سيء
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="" type="radio" name="maitenance_behavior" id="radio2Example10" value="سيء جداً" />
                    <label class="form-check-label" for="radio2Example10">
                      سيء جداً
                    </label>
                  </div>
                  <hr />
                  <p class="text-center"><strong>جودة خدمة الصيانة</strong></p>

                  <div class="form-check mb-2">
                    <input class="" type="radio" name="maitenance_service_speed" id="radio2Example11" value="ممتازة">
                    <label class="form-check-label" for="radio2Example11">
                      ممتازة
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="" type="radio" name="maitenance_service_speed" id="radio2Example12" value="جيدة" />
                    <label class="form-check-label" for="radio2Example12">
                      جيدة
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="" type="radio" name="maitenance_service_speed" id="radio2Example13" value="متوسطة" />
                    <label class="form-check-label" for="radio2Example13">
                      متوسطة
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="" type="radio" name="maitenance_service_speed" id="radio2Example14" value="سيئة" />
                    <label class="form-check-label" for="radio2Example14">
                      سيئة
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="" type="radio" name="maitenance_service_speed" id="radio2Example15" value="سيئة جداً" />
                    <label class="form-check-label" for="radio2Example15">
                      سيئة جداً
                    </label>
                  </div>
                  <hr />
                  <p class="text-center"><strong>سرعة تنفيذ خدمة الصيانة</strong></p>

                  <div class="form-check mb-2">
                    <input class="" type="radio" name="maitenance_service_execution_speed" id="radio2Example16" value="ممتازة" />
                    <label class="form-check-label" for="radio2Example16">
                      ممتازة
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="" type="radio" name="maitenance_service_execution_speed" id="radio2Example17" value="جيدة" />
                    <label class="form-check-label" for="radio2Example17">
                      جيدة
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="" type="radio" name="maitenance_service_execution_speed" id="radio2Example18" value="متوسطة" />
                    <label class="form-check-label" for="radio2Example18">
                      متوسطة
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="" type="radio" name="maitenance_service_execution_speed" id="radio2Example19" value="سيئة" />
                    <label class="form-check-label" for="radio2Example19">
                      سيئة
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="" type="radio" name="maitenance_service_execution_speed" id="radio2Example20" value="سيئة جداً" />
                    <label class="form-check-label" for="radio2Example20">
                      سيئة جداً
                    </label>
                  </div>
                  <hr />
                  <p class="text-center"><strong>توافق الخدمة مع الطلب</strong></p>
                  <div class="form-check mb-2">
                    <input class="" type="radio" name="service_and_request" id="radio2Example21" value="ممتازة" />
                    <label class="form-check-label" for="radio2Example21">
                      ممتازة
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="" type="radio" name="service_and_request" id="radio2Example22" value="جيدة" />
                    <label class="form-check-label" for="radio2Example22">
                      جيدة
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="" type="radio" name="service_and_request" id="radio2Example23" value="متوسطة" />
                    <label class="form-check-label" for="radio2Example23">
                      متوسطة
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="" type="radio" name="service_and_request" id="radio2Example24" value="سيئة" />
                    <label class="form-check-label" for="radio2Example24">
                      سيئة
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="" type="radio" name="service_and_request" id="radio2Example25" value="سيئة جداً" />
                    <label class="form-check-label" for="radio2Example25">
                      سيئة جداً
                    </label>
                  </div>
                  <hr />
                  <label form-check-label for="opinion_area">في حال وجود أي ملاحظة لا تتردد في إرسالها لنا</label>
                  <br /> <br />
                  <textarea type="textarea" class="form-control" name="opinion_area" style="height: 100px;" id="opinion_area">
            </textarea>
                  <div class="card-footer text-end col-md-12"></div>
                  <button type="submit" id="btnRating" class="btn send_btn" style="width: 100%; background-color: #162334; color: #fff;" >إرسال</button>
              </div>
            </div>
            </form>
            <button type="button" onclick="closePopupRating()" class="btn btn-danger close" style="font-size:16px ;">إغلاق</button>
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
                    <img src="./Images/logoM.jpg" class="rounded-circle" style="width: 100px; height: 100px;">
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
              <button type="button" onclick="closePopupRatingShow()" class="btn btn-danger close" style="font-size:16px ;">إغلاق</button>
            </div>
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
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script src="js/fileJsUser.js"></script>
</body>

</html>