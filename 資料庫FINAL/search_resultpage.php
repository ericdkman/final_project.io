<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$host = "localhost";
$user = "root";
$password = "";
$database = "final_project";
$link = mysqli_connect($host, $user, $password) or die("無法選擇資料庫"); // 建立與資料庫的連線物件
mysqli_select_db($link,$database); //選擇資料庫
mysqli_query($link,"SET NAMES utf8"); //設定編碼

/*if (!empty($_POST['facility'])) {
    $facility_arr = array();
    $facility_arr = $_POST['facility'];
    $sql = "SELECT * FROM house"
     
    $result = $link->query($sql);
}*/
 

$sql= mysqli_query($link,'SELECT * FROM house NATURAL JOIN `house_picture`');

 
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>蝸牛找殼去</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
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
                    <a href="管理者首頁.php" class="nav-item nav-link">首頁</a>
                    <!-- <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="service.html" class="nav-item nav-link">Services</a> -->
                    <!-- <a href="搜尋結果頁.html" class="nav-item nav-link active">Packages</a> -->
                    <div class="nav-item dropdown">
                        <!-- <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a> -->
                        <div class="dropdown-menu m-0"></div>
                    </div>
                </div>
                <!--<a href="" class="btn btn-primary rounded-pill py-2 px-4">註冊/登入</a>-->
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">您的房子找到了~</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">條件篩選</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">房屋篩選結果</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->


    <!-- Package Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">蝸牛找殼去</h6>
                <h1 class="mb-5">房屋篩選結果</h1>
            </div>
            <form action="search__resultpage.php" method="POST">
             
            <div class="row g-4 justify-content-center">
             
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="package-item">
                    <?php 
            while($result=mysqli_fetch_assoc($sql))
            {
            ?> 
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="<?php echo $result['圖片'];?>" alt="">
                        </div>
                         
                         
                        <div class="text-center p-4">
                            <div class="text-primary">
                                <h3 class="badge rounded-pill bg-light text-dark">標籤1</h3>
                                <h3 class="badge rounded-pill bg-light text-dark">標籤2</h3>
                                <h3 class="badge rounded-pill bg-light text-dark">標籤3</h3>
                            </div>
                            <br>
                                <h3 class="text-primary m-0"><?php echo $result['名稱']?></h3>
                                <h3 class="mb-0"> $<?php echo $result['價錢']?></h3>
                                <p><?php echo $result['地址']?></p>
                                <div class="d-flex justify-content-center mb-2">
                                    <!-- <a href="#" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a> -->
                                    <a href="" class="btn btn-primary rounded-pill py-2 px-4">詳細內容</a>
                                </div>
                            </br>
                        </div>
                        <?php
                        }
                        
                        ?>
                    </div>
                </div>
                <!-- 
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/property1.jpg" alt="">
                        </div>
                        <div class="text-center p-4">
                            <div class="text-primary">
                                <h3 class="badge rounded-pill bg-light text-dark">標籤1</h3>
                                <h3 class="badge rounded-pill bg-light text-dark">標籤2</h3>
                                <h3 class="badge rounded-pill bg-light text-dark">標籤3</h3>
                            </div>
                            <br>
                                <h3 class="text-primary m-0">基河二期國宅</h3>
                                <h3 class="mb-0">$100,0000</h3>
                            
                                <p>臺北市中山區敬業三路162巷</p>
                                <div class="d-flex justify-content-center mb-2"> 
                                     
                                    <a href="" class="btn btn-primary rounded-pill py-2 px-4">詳細內容</a>
                                </div>
                            </br>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/property1.jpg" alt="">
                        </div>
                        <div class="text-center p-4">
                            <div class="text-primary">
                                <h3 class="badge rounded-pill bg-light text-dark">標籤1</h3>
                                <h3 class="badge rounded-pill bg-light text-dark">標籤2</h3>
                                <h3 class="badge rounded-pill bg-light text-dark">標籤3</h3>
                            </div>

                            <br>
                                <h3 class="text-primary m-0">基河二期國宅</h3>
                                <h3 class="mb-0">$100,0000</h3>
                            
                                <p>臺北市中山區敬業三路162巷</p>
                                <div class="d-flex justify-content-center mb-2">
                                     
                                    <a href="" class="btn btn-primary rounded-pill py-2 px-4">詳細內容</a>
                                </div>
                            </br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/property1.jpg" alt="">
                        </div>
                        <div class="text-center p-4">
                            <div class="text-primary">
                                <h3 class="badge rounded-pill bg-light text-dark">標籤1</h3>
                                <h3 class="badge rounded-pill bg-light text-dark">標籤2</h3>
                                <h3 class="badge rounded-pill bg-light text-dark">標籤3</h3>
                            </div>
                            <br>
                                <h3 class="text-primary m-0">基河二期國宅</h3>
                                <h3 class="mb-0">$100,0000</h3>
                            
                                <p>臺北市中山區敬業三路162巷</p>
                                <div class="d-flex justify-content-center mb-2">
                                     
                                    <a href="" class="btn btn-primary rounded-pill py-2 px-4">詳細內容</a>
                                </div>
                            </br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/property1.jpg" alt="">
                        </div>
                        <div class="text-center p-4">                         
                            <div class="text-primary">                                
                                <h3 class="badge rounded-pill bg-light text-dark">標籤1</h3>
                                <h3 class="badge rounded-pill bg-light text-dark">標籤2</h3>
                                <h3 class="badge rounded-pill bg-light text-dark">標籤3</h3>
                            </div>
                            <br>
                                <h3 class="text-primary m-0">基河二期國宅</h3>
                                <h3 class="mb-0">$100,0000</h3>
                            
                                <p>臺北市中山區敬業三路162巷</p>
                                <div class="d-flex justify-content-center mb-2">
                                     
                                    <a href="" class="btn btn-primary rounded-pill py-2 px-4">詳細內容</a>
                                </div>
                            </br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/property1.jpg" alt="">
                        </div>
                        <div class="text-center p-4">
                            <div class="text-primary">
                                <h3 class="badge rounded-pill bg-light text-dark">標籤1</h3>
                                <h3 class="badge rounded-pill bg-light text-dark">標籤2</h3>
                                <h3 class="badge rounded-pill bg-light text-dark">標籤3</h3>
                            </div>
                            <br>
                                <h3 class="text-primary m-0">基河二期國宅</h3>
                                <h3 class="mb-0">$100,0000</h3>
                            
                                <p>臺北市中山區敬業三路162巷</p>
                                <div class="d-flex justify-content-center mb-2">
                                     
                                    <a href="" class="btn btn-primary rounded-pill py-2 px-4">詳細內容</a>
                                </div>
                            </br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/property1.jpg" alt="">
                        </div>
                        <div class="text-center p-4">
                            <div class="text-primary">
                                <h3 class="badge rounded-pill bg-light text-dark">標籤1</h3>
                                <h3 class="badge rounded-pill bg-light text-dark">標籤2</h3>
                                <h3 class="badge rounded-pill bg-light text-dark">標籤3</h3>
                            </div>
                            <br>
                                <h3 class="text-primary m-0">基河二期國宅</h3>
                                <h3 class="mb-0">$100,0000</h3>
                            
                                <p>臺北市中山區敬業三路162巷</p>
                                <div class="d-flex justify-content-center mb-2">
                                     
                                    <a href="" class="btn btn-primary rounded-pill py-2 px-4">詳細內容</a>
                                </div>
                            </br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/property1.jpg" alt="">
                        </div>
                        <div class="text-center p-4">
                            <div class="text-primary">
                                <h3 class="badge rounded-pill bg-light text-dark">標籤1</h3>
                                <h3 class="badge rounded-pill bg-light text-dark">標籤2</h3>
                                <h3 class="badge rounded-pill bg-light text-dark">標籤3</h3>
                            </div>
                            <br>
                                <h3 class="text-primary m-0">基河二期國宅</h3>
                                <h3 class="mb-0">$100,0000</h3>
                            
                                <p>臺北市中山區敬業三路162巷</p>
                                <div class="d-flex justify-content-center mb-2">
                                     
                                    <a href="" class="btn btn-primary rounded-pill py-2 px-4">詳細內容</a>
                                </div>
                            </br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/property1.jpg" alt="">
                        </div>
                        <div class="text-center p-4">
                            <div class="text-primary">
                                <h3 class="badge rounded-pill bg-light text-dark">標籤1</h3>
                                <h3 class="badge rounded-pill bg-light text-dark">標籤2</h3>
                                <h3 class="badge rounded-pill bg-light text-dark">標籤3</h3>
                            </div>
                            <br>
                                <h3 class="text-primary m-0">基河二期國宅</h3>
                                <h3 class="mb-0">$100,0000</h3>
                            
                                <p>臺北市中山區敬業三路162巷</p>
                                <div class="d-flex justify-content-center mb-2">
                                     
                                    <a href="" class="btn btn-primary rounded-pill py-2 px-4">詳細內容</a>
                                </div>
                            </br>
                        </div>
                    </div>
                </div> -->              
            </form>
    <!-- Package End -->



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