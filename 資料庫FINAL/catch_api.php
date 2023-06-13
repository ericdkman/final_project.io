<?php
$address = "台北市信義區信義路五段7號"; // 假设地址值通过 POST 方法传递
$gmap = new MapCalc('AIzaSyAzgjs1Ji_aegwfA9ITXNkura2Znmt8DYo');
$apiUrl = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address).'&sensor=false&APIKEY='.$apikey;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// 处理 API 响应数据
$data = json_decode($response, true);

if ($data['status'] == 'OK') {
    $latitude = $data['results'][0]['geometry']['location']['lat'];
    $longitude = $data['results'][0]['geometry']['location']['lng'];
} else {
    // 处理无效地址或其他错误情况
}

// 连接到数据库
$servername = "localhost";
$username = "root";
$password = "";
$database = "final_project";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die('数据库连接失败：' . $conn->connect_error);
}

// 插入经纬度数据
$sql = "INSERT INTO locations (latitude, longitude) VALUES ($latitude, $longitude)";
if ($conn->query($sql) === true) {
    echo "经纬度数据插入成功";
} else {
    echo "插入数据时出现错误：" . $conn->error;
}

$conn->close();
?>