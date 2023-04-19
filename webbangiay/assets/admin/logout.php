<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../resources/css/login.css">
  <title>Đăng xuất</title>
</head>

<body>
  <?php
  session_start();
  unset($_SESSION['current_user']);
  // header('location:danhsachsanpham.php');
  ?>
  <div id="user_logout" class="box-content">
    <h1>Đăng xuất tài khoản thành công</h1>
    <a href="./index.php">
      <p>Đăng nhập lại</p>
    </a>
  </div>
</body>

</html>