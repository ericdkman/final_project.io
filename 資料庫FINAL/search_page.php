<?php
header('Content-Type: application/json;charset=utf-8'); // 回傳 json 格式的資料

$host = "localhost";
$user = "root";
$password = "";
$database = "final_project";
$link = mysqli_connect($host, $user, $password) or die("無法選擇資料庫"); // 建立與資料庫的連線物件
mysqli_select_db($link,$database); //選擇資料庫
mysqli_query($link,"SET NAMES utf8"); //設定編碼

// 根據 GET 參數設定相關值
if (!empty($_GET['act'])) {
    $action = $_GET['act'];
}
if (!empty($_GET['val'])) {
    $val = $_GET['val'];
}
$list = array(); //存放查詢結果的陣列
switch ($action) {

    case 'county': // 查詢城市資料
        $sql = "SELECT * FROM city WHERE 1";
        $result = mysqli_query($link,$sql); //執行SQL查詢
        while ($row = mysqli_fetch_assoc($result)) { //從查詢結果中取得下一列關聯數組
            $list[] = $row; // 將關聯數組加入回傳結果陣列
        }
        break;

    case 'district': // 查詢地區資料
        $sql = "SELECT 區名 FROM area WHERE 縣市 = '$val'";
        $result = mysqli_query($link,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        break;

    case 'ethnicity': // 查詢族群資料
        $sql = "SELECT * FROM ethnic_group WHERE 1";
        $result = mysqli_query($link,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        break;
	
	case 'objective': // 查詢看屋資料
		$sql = "SELECT * FROM reason WHERE 1";
		$result = mysqli_query($link,$sql);
		while ($row = mysqli_fetch_assoc($result)) {
			$list[] = $row;
		}
		break;     
}
echo json_encode($list); // 將陣列$list轉換成JSON格式的字串
return; // 結束當前PHP程式的執行，並將JSON字串傳送回瀏覽器端

# 釋放記憶體
mysqli_free_result($result);

# 釋放連線
mysqli_close($link);
?>