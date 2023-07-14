



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" href="CSS/UserRegisteration.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/user_dashboard.css" >


    <title>لوحة التحكم</title>
  </head>
  <body>
    
    <nav class="navbar navbar-dark  fixed-top bg-primary flex-md-nowrap p-0 shadow">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
              <a class="nav-link" href="#" style="font-size: 16px; color: white;">تسجيل الخروج</a>
            </li>
          </ul>
        
          <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" style="font-size: 18px;"></span></button>
        <input type="search" class="form-control form-control-primary w-100" placeholder="... ابحث " style="text-align: right; font-size: 16px;" >
        
        
    </nav>
    

    <div class="container-fluid">
        <div class="row">
          <!-- Sidear -->

          <div class="col-md-2 bg-light d-none d-md-block sidebar">
            <div class="left-sidebar">
                <ul class="nav flex-column sidebar-nav">
                    <li class="nav-item">
                      <a class="nav-link active" href="#" style="font-size:14px; color: #162334; ">
                        <span class="glyphicon glyphicon-home" aria-hidden="true">&nbsp;</span>
الصفحة الرئيسية                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="maintenanceRequest_maraqar.html" style="font-size:14px; color: #162334; ">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;</span>
                        إنشاء طلب
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="user_dashboard.html" style="font-size:14px; color: #162334;">
                        <span class="glyphicon glyphicon-comment" aria-hidden="true">&nbsp;</span>
                        عرض الطلبات
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="login_maraqar.html" style="font-size:14px; color: #162334;">
                        <span class="glyphicon glyphicon-log-out" aria-hidden="true">&nbsp;</span>
                        تسجيل الخروج
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#" style="font-size: 14px; color: #162334;">
                        <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">&nbsp;</span>
                        تقييم خدمات الصيانة
                      </a>
                    </li>
                  </ul>
                  
            </div>
          </div>
          
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
              
            <h3>الطلبات<img class="" src="Images/شعار مار المتميزه للمقاولات.png" id="dashboard_logo"></h3>
            <hr>
            <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar" id="scroll_table" style="height: 300px;  overflow: scroll;">
              <table class="table table-bordered mb-0" id="content_table">
                <thead class="table_head">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">الاسم الأول</th>
                    <th scope="col">الاسم الأخير</th>
                    <th scope="col">البريد الالكتروني</th>
                    <th>العمليات</th>
                    
                  </tr>
                  
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Project Manager</td>
                    <td><button type="button" class="btn btn-success" style="font-size: 12px;">عرض الطلب</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-light" style="font-size: 12px;">حالة الطلب</button>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>JS developer</td>
                    <td><button type="button" class="btn btn-success" style="font-size: 12px;">عرض الطلب</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-light" style="font-size: 12px;">حالة الطلب</button>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>Bird</td>
                    <td>Back-end developer</td>
                    <td><button type="button" class="btn btn-success" style="font-size: 12px;">عرض الطلب</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-light" style="font-size: 12px;">حالة الطلب</button>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Martin</td>
                    <td>Smith</td>
                    <td>Back-end developer</td>
                    <td><button type="button" class="btn btn-success" style="font-size: 12px;">عرض الطلب</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-light" style="font-size: 12px;">حالة الطلب</button>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Kate</td>
                    <td>Mayers</td>
                    <td>Scrum master</td>
                    <td><button type="button" class="btn btn-success" style="font-size: 12px;">عرض الطلب</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-light" style="font-size: 12px;">حالة الطلب</button>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  </tr>
                 
                  <tr>
                    <th scope="row">6</th>
                    <td>Larry</td>
                    <td>Bird</td>
                    <td>Back-end developer</td>
                    <td><button type="button" class="btn btn-success" style="font-size: 12px;">عرض الطلب</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-light" style="font-size: 12px;">حالة الطلب</button>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>Larry</td>
                    <td>Bird</td>
                    <td>Back-end developer</td>
                    <td><button type="button" class="btn btn-success" style="font-size: 12px;">عرض الطلب</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-light" style="font-size: 12px;">حالة الطلب</button>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  </tr>
                  <tr>
                    <th scope="row">8</th>
                    <td>Larry</td>
                    <td>Bird</td>
                    <td>Back-end developer</td>
                    <td><button type="button" class="btn btn-success" style="font-size: 12px;">عرض الطلب</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-light" style="font-size: 12px;">حالة الطلب</button>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <br>
            <h3>العمليات</h3>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">إنشاء طلب</h5>
                      <p class="card-text" style="font-size: 12px;">قم بإنشاء طلب صيانة جديد لعقارك</p>
                      <a href="maintenanceRequest_maraqar.html" class="btn btn-primary" style="font-size: 12px; background-color: #162334;">إنشاء طلب</a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">عرض الطلبات</h5>
                      <p class="card-text" style="font-size: 12px;">قم بعرض جميع طلبات الصيانة التي قمت بإنشائها و إرسالها لنا</p>
                      <a href="user_dashboard.html" class="btn btn-primary" style="font-size: 12px; background-color: #162334;">عرض الطلبات</a>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">تقييم الخدمة</h5>
                      <p class="card-text" style="font-size: 12px;">قم بتقييم الخدمات التي نقدمها لحضرتك عن طريق الإجابة عن بعض الأسئلة لتحسين خدماتنا و الوصول للأفضل لإرضائكم</p>
                      <a href="#" class="btn btn-primary" style="font-size: 12px; background-color: #162334;">تقييم الخدمة</a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">تسجيل الخروج</h5>
                      <p class="card-text" style="font-size: 12px;">قم بتسجيل الخروج من حسابك</p>
                      <br>
                      <a href="login_maraqar.html" class="btn btn-primary" style="font-size: 12px; background-color: #162334;">تسجيل الخروج</a>
                    </div>
                  </div>
                </div>
              </div>
                              
          </main>
        </div>
        
      </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
