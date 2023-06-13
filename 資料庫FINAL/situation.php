<?php
 

$host = "localhost";
$user = "root";
$password = "";
$database = "final_project";
$link = mysqli_connect($host, $user, $password) or die("無法選擇資料庫"); // 建立與資料庫的連線物件
mysqli_select_db($link,$database); //選擇資料庫
mysqli_query($link,"SET NAMES utf8"); //設定編碼

/* 
 * 獲取地址經緯度 - 從google map
 */  
function getAddressLatLng($addr='')
{ 
   //向google map請求
//    $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$addr.'&sensor=false'); 
   $geocode=file_get_contents('https://maps.googleapis.com/maps/api/js?key=AIzaSyAzgjs1Ji_aegwfA9ITXNkura2Znmt8DYo&callback=initMap&v=weekly');
   $output= json_decode($geocode);
    
   //經度
   $longitude = $output->results[0]->geometry->location->lng;
   //緯度
   $latitude = $output->results[0]->geometry->location->lat;
   //返回資料
   return array('lng'=>$longitude,'lat'=>$latitude);
}  
$sql="SELECT 地址 FROM house";
$result = $link->multi_query($sql);
if ($result->num_rows > 0) {     
     
while($row = $result->fetch_assoc()) {
    $geo1 = getAddressLatLng($result);
    $sql = "UPDATE house SET `經度` = '$geo1['lng']', `緯度` = '$geo1['lat']' WHERE 地址 = '$result'";
     
    echo $geo1['lng'];
    echo $geo1['lat'];
}
}

$addr1 = "台北市信義區市府路1號";
   //台北101的地址    
    
   //獲取台北市政府經緯度
$geo1 = getAddressLatLng($addr1);
   
       
    
    
?>
