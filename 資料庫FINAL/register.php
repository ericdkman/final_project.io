<?php  
if ($_SERVER["REQUEST_METHOD"]==="POST") {   
  $account = $_POST['username'];
  $password1 = $_POST['password1'];
  $confirm_password = $_POST['confirm_password'];

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
  
  $check="SELECT * FROM `user_profile` WHERE `使用者名稱`='$account'";
    if(mysqli_num_rows(mysqli_query($conn,$check))==0){
      if ($password1 == $confirm_password) {
        if (strlen($password1) <= 10) {
          $sql="INSERT INTO user_profile (使用者名稱, 密碼)
            VALUES ('$account','$password1')";      
          if(mysqli_query($conn, $sql)){
            header("Location: login.php");
            exit();
          }
        } else {
          echo '<p>密碼不得大於10個字元。</p>';
        }
      } else {
        echo '<p>註冊失敗，請檢查密碼和確認密碼。</p>';
      }     
    
    } else {
      echo '<p>該帳號已有人使用!</p>';
    }       
}

 
?>
<!DOCTYPE html>
<html>
<head>
  <title>管理者註冊</title>
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
  </style>
</head>
<body>
  <div class="container">
    <h2>管理者註冊</h2>
    <form action = "register.php" class="register" method="POST">
      <input type="text" name="username" required placeholder="帳號">
      <input type="password" name="password1" required placeholder="密碼">
      <input type="password" name="confirm_password" required placeholder="密碼">
      <input type="submit" name = "register" value="註冊">
       
    </form>
  </div>
</body>
</html>
