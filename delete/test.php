<?php

include "../db/dbConn.php";
$sql = "SELECT mainte.*, users.*
        FROM mainte
        JOIN users ON mainte.UserIDF = users.UserID;
       
";
$result = mysqli_query($connection, $sql);
if ($result->num_rows > 0) {
  $count = 1;
  while ($row = $result->fetch_assoc()) {
    // $row_json = json_encode($row);
    var_dump($row);
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo $row["Email"]; 
    echo $row["FirstName"];
    var_dump($row["Img"]);
    $images11 = explode(",", $row["Img"]);
    foreach($images11 as $image1) {
      echo "<br>". $image1 . "<br>";
      echo "<img src='../users/uploads/" . $image1 . "' width='250px' height='100px' class='imginner' alt='hrtj'>";
      echo "<br>";
    
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>لوحة تحكم الأدمن</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/Untitled.jpg" class="rounded-circle" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
  <link href="css/popup.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end" id="sidebar-wrapper" style="background-color: #162334;">

      <div class="sidebar-heading border-bottom" style="color: white;"><a href="#" class="d-flex align-items-center text-white text-decoration-none " id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="Images/Untitled.jpg" alt="hugenerd" width="50" height="50" class="rounded-circle">
          <h4 style="font-weight: bolder; font-size: 20px; text-align: right; font-style: italic;"> &nbsp;&nbsp;قائمة العمليات</h4>

        </a></div>
      <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light p-3 sidebar_item" href="#!" style="background-color: #162334; color: white;"><i class="bi bi-list-ul" style="color: white; font-size: 18px;">&nbsp;عرض الطلبات</i></a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 " href="#!" style=" background-color: #162334; color: white; "><i class="bi bi-person-add" style="font-size: 18px;">&nbsp;إضافة فني صيانة</i></a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 " href="#!" style="background-color: #162334; color: white; "><i class="bi bi-box-arrow-right" style="font-size: 18px;">&nbsp;تسجيل الخروج</i></a>
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
              <li class="nav-item active"><a class="nav-link" href="#!" style=" font-weight: bolder;">الرئيسية</a></li>
              <li class="nav-item"><a class="nav-link" href="#!" style=" font-weight: bolder;">بريد الموقع</a></li>
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
            <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar" id="scroll_table" style="height: 300px;  overflow: scroll; background-color: #162334; color: white;">
<?php 
$result = mysqli_query($connection, $sql);

?>
              <table class="table table-bordered mb-0" id="content_table" style="color: white; text-align: center; ">
                <thead class="table_head">

                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">الاسم الأول</th>
                    <th scope="col">الاسم الأخير</th>
                    <th scope="col"> اسم المشروع </th>
                    <th>العمليات</th>

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
                        <th scope="row"><?php echo $count; ?></th>
                        <td><?php echo $row["Email"]; ?></td>
                        <td>Otto</td>
                        <td><?php echo $row["ProjectName"]; ?></td>
                        <td>
                          <button type="button" onclick="openPopup('<?php echo htmlspecialchars($row_json, ENT_QUOTES, 'UTF-8'); ?>')" class="btn btn-outline-light" style="font-size: 12px;">
                            <span class="glyphicon glyphicon-list-alt"></span>عرض الطلب
                          </button>
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <button type="button" class="btn btn-primary" style="font-size: 12px;">
                            <span class="glyphicon glyphicon-edit"></span> تعديل حالة الطلب
                          </button>
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <button type="button" class="btn btn-success" style="font-size: 12px;">
                            <span class="glyphicon glyphicon-arrow-down"></span>تحميل الطلب
                          </button>
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <button type="button" class="btn btn-danger" style="font-size: 12px;">
                            <span class="glyphicon glyphicon-trash"></span>حذف الطلب
                          </button>
                        </td>
                      </tr>
                      <div id="popup" class="popup">
                        <div class="popup-content">
                          <span class="close" onclick="closePopup()">&times;</span>

                          <div id="tid12" class="header">
                            <h2>عرض البيانات</h2>
                          </div>
                          <div class="content">
                            <div class="project">
                              <h3>معلومات المشروع</h3>
                              <p>اسم المشروع: <?php echo $row['ProjectName']; ?> </p>
                              <p>اسم الحي: <?php echo $row['Neighborhood']; ?> </p>
                              <p>رقم القطعة: <?php echo  $row['PieceNumber']; ?> </p>
                              <p>رقم الوحدة: <?php echo $row['UnitNumber']; ?> </p>
                              <p>رقم الطابق: <?php echo $row['FloorNumber']; ?> </p>
                              <p>تاريخ العقد: <?php echo $row['DateContract']; ?> </p>
                            </div>
                            <div class="request">
                              <h3>معلومات الطلب</h3>
                              <p>نوع الطلب: <?php echo  $row['TypeRequest']; ?></p>
                              <p>وصف الطلب: <?php echo  $row['Description']; ?></p>
                              <p>حالة الطلب: <?php echo  $row['Status']; ?></p>
                              <p>تاريخ الطلب: <?php echo  $row['RequestDate']; ?></p>
                            </div>
                            <div class="user">
                              <h3>معلومات المستخدم</h3>
                              <p>الاسم: <?php echo $row['FirstName'] . " " . $row['LastName']; ?> </p>
                              <p>الرقم الوطني: <?php echo $row['NationalNumber']; ?> </p>
                              <p>رقم الهاتف: <?php echo $row['Phone']; ?> </p>
                              <p>البريد الإلكتروني: <?php echo $row['Email']; ?> </p>
                            </div>
                            <div id="img12" class="images">
                            <!-- <img src="../users/uploads/Screenshot from 2023-05-17 16-55-26.png" alt=""> -->
                            
                            <?php
                                var_dump($row["Img"]);
                                $images11 = explode(",", $row["Img"]);
                                foreach($images11 as $image1) {
                                  echo "<br>". $image1 . "<br>";
                                  echo "<img src='../users/uploads/" . $image1 . "' width='250px' height='100px' class='imginner' alt='hrtj'>";
                                  echo "<br>";
                                
                                }
                              ?>
                            </div>
                          </div>
                        </div>

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
  </div>
  </div>


  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script src="./js/scripts.js"></script>
</body>

</html>