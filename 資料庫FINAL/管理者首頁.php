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
                    <a href="管理者首頁.php" class="nav-item nav-link">首頁</a>
                    <a href="新增房屋.php" class="nav-item nav-link">新增房屋</a>
                    <div class="nav-item dropdown">
                        <div class="dropdown-menu m-0">
                        </div>
                    </div>
                </div>
                <!--<a href="" class="btn btn-primary rounded-pill py-2 px-4">註冊/登入</a> -->
            </div>
        </nav>

         
        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-3 mt-lg-0 text-center">
                        <h1 class="display-4 text-white mb-3 animated slideInDown">找尋你中意的房子</h1>
                        <!-- <p class="fs-4 text-white mb-4 animated slideInDown">Tempor erat elitr rebum at clita diam amet diam et eos erat ipsum lorem sit</p> -->
                        <form action="search_resultpage.php" method="POST">
                        <div class="position-relative w-75 mx-auto animated slideInDown">
                            <select class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5 custom-select" id="county" placeholder="縣市">
                                <option value="全選">縣市</option>
                                 
                            </select>
                            <select class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5 mt-3" id="district" placeholder="鄉鎮地區">
                                <option value="全選">鄉鎮市區</option>
                                 
                            </select>
                            <select class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5 mt-3" id="ethnicity" placeholder="族群">
                                <option value="全選">族群</option>
                                 
                            </select>
                            <select class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5 mt-3" id="objective" placeholder="看屋目標">
                                <option value="購買">看屋目標</option>
                                 
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">蝸牛找殼去</h6>
                <h1 class="mb-5">需求篩選</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s" >
                    <div class="service-item rounded pt-3" style="height: 400px;">
                        <div class="p-4">
                            <h5>鄰近地標</h5>
                            <ul>
                                <li>
                                    <input type="checkbox" id="醫院" class='ck1' name="facility[]">
                                    <label for="near_hospital">進醫院</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="商圈" name="facility[]">
                                    <label for="shopping">近商圈</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="公車站" name="facility[]">
                                    <label for="bus">近公車站</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="捷運" name="facility[]">
                                    <label for="metro">近捷運</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="train" name="facility[]">
                                    <label for="train">近火車站</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="high_speed_rail" name="facility[]">
                                    <label for="high_speed_rail">近高鐵站</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="babysit" name="facility[]">
                                    <label for="babysit">托嬰中心(0 ~ 未滿2歲)</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="kindergarten" name="facility[]">
                                    <label for="kindergarten">幼兒園(2 ~ 未滿6歲)</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="elementary_school" name="facility[]">
                                    <label for="elementary_school">小學(6 ~ 未滿12歲)</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="junior_high" name="facility[]">
                                    <label for="junior_high">國中(12 ~ 未滿15歲)</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="high_school" name="facility[]">
                                    <label for="high_school">高中(15 ~ 18歲)</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="vocational_school" name="facility[]">
                                    <label for="vocational_school">高職(15 ~ 18歲)</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="college" name="facility[]">
                                    <label for="college">大學(18+歲)</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded pt-3" style="height: 400px;">
                        <div class="p-4">
                            <h5>嫌惡設施</h5>
                            <ul>
                                <li>
                                    <input type="checkbox" id="temple" name="temple">
                                    <label for="temple">宮廟</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="crematory" name="crematory">
                                    <label for="crematory">焚化爐</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="cemetery" name="cemetery">
                                    <label for="cemetery">墓地</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="airport" name="airport">
                                    <label for="airport">機場</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="nightmarket" name="nightmarket">
                                    <label for="nightmarket">夜市</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="port" name="port">
                                    <label for="port">港口</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="highway" name="highway">
                                    <label for="highway">高速公路</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="hospital" name="hospital">
                                    <label for="hospital">醫院</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded pt-3" style="height: 250px;">
                        <div class="p-4">
                            <h5>屋齡</h5>
                            <ul>
                                <li>
                                    <input type="checkbox" id="pre_sale" name="pre_sale">
                                    <label for="pre_sale">預售屋</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="new" name="new">
                                    <label for="new">新成屋</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="pre_owned" name="pre_owned">
                                    <label for="pre_owned">中古屋</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded pt-3" style="height: 250px;">
                        <div class="p-4">
                            <h5>屋型</h5>
                            <ul>
                                <li>
                                    <input type="checkbox" id="condo" name="condo">
                                    <label for="condo">電梯大樓</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="house" name="house">
                                    <label for="house">透天</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="apartment" name="apartment">
                                    <label for="apartment">公寓</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="villa" name="villa">
                                    <label for="villa">別墅</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mansion" name="mansion">
                                    <label for="mansion">華夏</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="shop" name="shop">
                                    <label for="shop">店面</label>
                                </li>
                            </ul>
                            <br>
                            <br>
                            <br>
                            <input type="submit" class="btn btn-primary rounded-pill py-2 px-4" class name="send" value="search">
                             
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
<script>
    $(function() {  // 當網頁讀取完成後執行以下程式
            $.ajax({  // 以ajax方法發出請求
                type: "GET",
                url:  'search_page.php', // 請求的網址
                data: { act: 'county' }, // 傳遞的參數
                dataType: "json", // 回傳的資料型態
                success: function(result) {  // 當請求成功後執行以下程式
                    for (i = 0; i < result.length; i++) {
                        $("#county").append("<option value='" + result[i]['縣市編號'] + "'>" + result[i]['縣市'] + "</option>"); // 將資料加入縣市選擇列表
                    }
                },
                error: function(xhr, status, msg) {  // 當請求失敗後執行以下程式
                    console.error(xhr);  // 顯示錯誤訊息
                    console.error(msg);
                }
            });
        
    });
    $('#county').change(function() {
        $('#district').empty().append("<option value=''>請選擇</option>");
         
        var i = 0;
        $.ajax({
            type: "GET",
            url:  'search_page.php', // 請求的網址
            data: { act: 'district', val: $('#county').val() }, // 傳遞的參數
            dataType: "json", // 回傳的資料型態
            success: function(result) {  // 當請求成功後執行以下程式
                for (i = 0; i < result.length; i++) {
                    $("#district").append("<option value=''>" + result[i]['區名'] + "</option>"); // 將資料加入縣市選擇列表
                }
            },
            error: function(xhr, status, msg) {  // 當請求失敗後執行以下程式
                console.error(xhr);  // 顯示錯誤訊息
                console.error(msg);
            }
        });
        if($('#county').find(":selected").text() == '請選擇') {
            var city = '';
        }
        else {
            var city = $('#county').find(":selected").text();
        }
        
    });
     
    $(function() {  // 當網頁讀取完成後執行以下程式
            $.ajax({  // 以ajax方法發出請求
                type: "GET",
                url:  'search_page.php', // 請求的網址
                data: { act: 'ethnicity' }, // 傳遞的參數
                dataType: "json", // 回傳的資料型態
                success: function(result) {  // 當請求成功後執行以下程式
                    for (i = 0; i < result.length; i++) {
                        $("#ethnicity").append("<option value=''>" + result[i]['名稱'] + "</option>"); // 將資料加入縣市選擇列表
                    }
                },
                error: function(xhr, status, msg) {  // 當請求失敗後執行以下程式
                    console.error(xhr);  // 顯示錯誤訊息
                    console.error(msg);
                }
            });
        
    });

    $(function() {  // 當網頁讀取完成後執行以下程式
            $.ajax({  // 以ajax方法發出請求
                type: "GET",
                url:  'search_page.php', // 請求的網址
                data: { act: 'objective' }, // 傳遞的參數
                dataType: "json", // 回傳的資料型態
                success: function(result) {  // 當請求成功後執行以下程式
                    for (i = 0; i < result.length; i++) {
                        $("#objective").append("<option value=''>" + result[i]['看房緣由'] + "</option>"); // 將資料加入縣市選擇列表
                    }
                },
                error: function(xhr, status, msg) {  // 當請求失敗後執行以下程式
                    console.error(xhr);  // 顯示錯誤訊息
                    console.error(msg);
                }
            });
        
    });     
     
</script>

</html>