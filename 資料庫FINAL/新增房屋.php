<?php  
if ($_SERVER["REQUEST_METHOD"]==="POST") {   
  $house_name = $_POST['house_name'];
  $price = $_POST['price'];
  $postal_code = $_POST['postal_code'];   
  $age = $_POST['age'];
  $house_type = $_POST["house_type"];
  $house_objective = $_POST["house_objective"];
  $address = $_POST["address"];
  $illustrate = $_POST['illustrate'];
  $lat = $_POST['lat'];
  $lng = $_POST['lng'];

  /*$filename = $_FILES["image"]["name"];
  $tempname = $_FILES["image"]["tmp_name"];
  $folder = "./image/" . $filename;*/
 
   
  /*$lng = shell_exec("python geocoder_lng.py $address");
  $lat = shell_exec("python geocoder.py $address"); */
     
   

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "final_project";

  // 建立與資料庫的連接
  $conn = new mysqli($servername, $username, $password, $database);
  mysqli_query($conn, "SETS NAMES utf8");
  if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
  }
   
  $sql ="INSERT INTO house (`郵遞區號`, `地址`, `名稱`, `類型`, `屋齡`, `說明`, `價錢`, `租/賣`, `緯度`, `經度`)
            VALUES ('$postal_code','$address','$house_name', '$house_type', '$age', '$illustrate', '$price', '$house_objective', '$lat', '$lng')";
  if($conn->query($sql) === TRUE){
    echo "New records created successfully";     
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
   }          
            
  /*$sql1.="SELECT 房屋編號 FROM house ORDER BY 房屋編號 DESC LIMIT 1";
  $result1 = $conn->query($sql1);          
  $sql2.="INSERT INTO house_picture (`房屋編號`, `圖片`) VALUES ('$sql1', '$filename')";    
    
   if($conn->query($sql2) === TRUE){
    echo "New records created successfully";     
    } else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
   }*/ 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>蝸牛找殼去</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- viewport => 設計手機版網頁的資訊 -->
    <meta content="房" name="keywords">
    <!-- keywords => 指定關鍵字給google爬-->
    <meta content="" name="description">

    <!-- Favicon -->
    
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts => 使用google提供的字體-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>蝸牛找殼去</h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="管理者首頁.php" class="nav-item nav-link active">首頁</a>
                    <a href="api.html" class="nav-item nav-link active">查詢經緯度</a>
                    <!--<div class="nav-item dropdown">
                        <a href="#" class="nav-item nav-link active">使用者</a>
                        <div class="dropdown-menu m-0">
                            <a href="新增房屋.html" class="dropdown-item">註冊/登入</a>
                            <a href="新增房屋.html" class="dropdown-item">使用者頁面</a>
                            <a href="team.html" class="dropdown-item">瀏覽紀錄</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-item nav-link active">管理者</a>
                        <div class="dropdown-menu m-0">
                            <a href="管理者登入.html" class="dropdown-item">登入</a>
                            <a href="新增房屋.html" class="dropdown-item">新增頁面</a>
                            <a href="管理者的新增頁面.html" class="dropdown-item">新增紀錄</a>
                        </div>
                    </div>--> 
                </div>
                <!-- <a href="" class="btn btn-primary rounded-pill py-2 px-4">Register</a> -->
            <!-- <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.html" class="nav-item nav-link">首頁</a>
                    <div class="nav-item dropdown">
                        <div class="dropdown-menu m-0">
                        </div>
                    </div>
                </div>
                <a href="index.html" class="nav-item nav-link">新增房屋</a>
                
                <a href="" class="btn btn-primary rounded-pill py-2 px-4">註冊/登入</a>
            </div> -->
        </nav>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">蝸牛找殼去</h6>
                <h1 class="mb-5">新增頁面</h1>
            </div>
            <form action = "新增房屋.php" method="POST" enctype="multipart/form-data">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s" >
                    <div class="service rounded pt-3" style="height: 400px; box-shadow: 0 0 45px rgba(0, 0, 0, .08);">
                        <div class="p-4">                
                            <h5>房屋名稱</h5>
                            <div class="position-relative w-75 mx-auto animated slideInDown">
                                <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5 mt-3 border border-dark" type="text" name = "house_name" placeholder="房屋名稱">
                            </div> 
                            <h5>價格</h5>
                            <div class="position-relative w-75 mx-auto animated slideInDown">
                                <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5 mt-3 border border-dark" type="text" name = "price" placeholder="請輸入價格">
                            </div>
                            <h5>經度</h5>
                            <div class="position-relative w-75 mx-auto animated slideInDown">                                 
                                <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5 mt-3" type="text" name="lng" placeholder="ex: 121.5645389">
                                
                            </div> 
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded pt-3" style="height: 400px;">
                        <div class="p-4">
                            <h5>郵遞區號</h5>
                            <div class="position-relative w-75 mx-auto animated slideInDown">                                 
                                <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5 mt-3" type="text" name="postal_code" placeholder="ex:220">
                                
                            </div> 
                            <h5>地址</h5>
                            <div class="position-relative w-75 mx-auto animated slideInDown">                                 
                                <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5 mt-3" type="text" name="address" placeholder="xx市xx區X路X巷X號">
                                
                            </div>
                             
                            <h5>緯度</h5>
                            <div class="position-relative w-75 mx-auto animated slideInDown">                                 
                                <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5 mt-3" type="text" name="lat" placeholder="ex: 25.033976">
                                
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded pt-3" style="height: 400px;">
                        <div class="p-4">
                            <div class="position-relative w-75 mx-auto animated slideInDown">
                                <h5>屋齡</h5>
                                <select class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5 custom-select" name="age" id="new" placeholder="屋齡">
                                    <option value=""></option>
                                    <option value="預售屋">預售屋</option>
                                    <option value="新成屋">新成屋</option>
                                    <option value="中古屋">中古屋</option>
                                </select>
                                <h5>屋型</h5>
                                <select class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5 mt-3" name="house_type" id="type" placeholder="屋型">
                                    <option value="公寓">公寓</option>
                                    <option value="別墅">別墅</option>
                                    <option value="店面">店面</option>
                                    <option value="華廈">華廈</option>
                                    <option value="透天">透天</option>
                                    <option value="電梯大樓">電梯大樓</option>
                                     
                                </select>
                                
                                <h5>看屋目標</h5>
                                <select class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5 mt-3" name="house_objective" id="objective" placeholder="租/賣">
                                    <option value="租">租</option>
                                    <option value="賣">賣</option>
                                     
                                </select>  
                            </div>     
                        </div> 
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded pt-3" style="height: 250px;">
                        <div class="p-4">
                            
                                <h5>新增圖片</h5>
                                <input type="file" id="imageInput" name="image" accept="image/*" />
                                <br>
                                <br>
                                <button type="button" onclick="previewImage()">預覽圖片</button>
                                <br>
                                <h5>新增說明</h5>
                                <input type="text" id="textInput" name="illustrate" placeholder="輸入文字">
                            
                                                
                            <div id="imageContainer"></div>
                                            
                            <script>
                                function previewImage() {
                                    var input = document.getElementById('imageInput');
                                    var container = document.getElementById('imageContainer');
                                    var textInput = document.getElementById('textInput');
                                    
                                    var file = input.files[0];
                                    var reader = new FileReader();
                                    
                                    reader.onload = function(e) {
                                        container.innerHTML = '<img src="' + e.target.result + '" alt="圖片" />';
                                        container.innerHTML += '<p>' + textInput.value + '</p>';
                                    };
                                    
                                    reader.readAsDataURL(file);
                                }
                            </script>
                            <br>
                            <br>
                            <br>
                            <br>
                            <input type="submit" class="btn btn-primary rounded-pill py-2 px-4" name = "insert" value="新增">                                
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

                        


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
 
</html>