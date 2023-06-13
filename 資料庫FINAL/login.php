<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 獲取登入表單提交的資料
    $phone = $_POST['username'];
    $password1 = $_POST['password1'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "final_project";

    // 建立與資料庫的連接
    $conn = new mysqli($servername, $username, $password, $database);
    mysqli_query($conn, 'SET NAMES utf8');
    // 檢查連接是否成功
    if ($conn->connect_error) {
        die("連接失敗: " . $conn->connect_error);
    }

    // 執行登入的SQL語句
    $sql = "SELECT * FROM `user_profile` WHERE `使用者名稱`   = '$phone' AND `密碼` = '$password1'";
    $result = $conn->query($sql);

}
?>
<!DOCTYPE html>
<html>
<head>
  <title>管理者登入</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      padding: 20px;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .container h2 {
      text-align: center;
    }

    .container input[type="text"],
    .container input[type="password"] {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      margin-bottom: 10px;
      box-sizing: border-box;
      border-radius: 4px;
    }

    .container input[type="submit"] {
      background-color: #4caf50;
      color: #fff;
      border: none;
      padding: 12px 20px;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
    }

    .container input[type="submit"]:hover {
      background-color: #45a049;
    }

    .container .register-link {
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>使用者登入</h2>
    <form action="login.php" class="login" method="POST">
      <input type="text" name="username" required placeholder="帳號">
      <input type="password" name="password1" required placeholder="密碼">
      <input type="submit" name="login" value="登入">
      <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if ($result->num_rows > 0) {
            // 登入成功，儲存使用者ID至Session
              $row = $result->fetch_assoc();
              if($row['管理員權限'] == 'y') {
                $_SESSION['使用者名稱'] = $row['使用者名稱'];
                $_SESSION['密碼'] = $row['密碼'];
                header("Location: 新增房屋.php");
                exit();
              } elseif($row['管理員權限'] == 'n') {
                $_SESSION['使用者名稱'] = $row['使用者名稱'];
                $_SESSION['密碼'] = $row['密碼'];
                header("Location: 首頁.php");
                exit();
              }            
          
          } else {
             
            echo '<p>登入失敗，請檢查帳號和密碼。</p>';
          } 
          }
          ?>
    </form>
    <div class="register-link">
      <p>還沒有帳號？<a href="register.php">註冊</a></p>
    </div>
  </div>
</body>
</html>
