<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
  <link rel="stylesheet" href="./assets/resources/css/login_client.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
  <?php
  session_start();
  include './assets/config/connect.php';
  $error = false;
  if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
    $result = mysqli_query($con, "Select * from nguoidung WHERE (taikhoan ='" . $_POST['username'] . "' AND matkhau = md5('" . $_POST['password'] . "'))");
    if (!$result) {
      $error = mysqli_error($con);
    } else {
      $user = mysqli_fetch_assoc($result);
      $_SESSION['current_user'] = $user;
    }
    mysqli_close($con);
    if ($error !== false || $result->num_rows == 0) {
  ?>
      <div class="box-content">
        <h1>Thông báo</h1>
        <h4><?= !empty($error) ? $error : "Thông tin đăng nhập không chính xác" ?></h4>
        <a href="./dangnhap.php">Quay lại</a>
      </div>
  <?php
      exit;
    }
  }
  ?>
  <?php
  include './assets/client/facebook_source.php';
  ?>
  <?php if (empty($_SESSION['current_user'])) { ?>
    <div class="main_div">
      <div class="title">Đăng nhập</div>
      <div class="social_icons">
        <a href="<?= $loginUrl ?>"><i class="fab fa-facebook-f"></i> <span>Facebook</span></a>
        <a href="<?= $authUrl ?>"><i class="fab fa-google"></i><span>Google</span></a>
      </div>
      <form action="#">
        <div class="input_box">
          <input type="text" name=placeholder="Tài Khoản" required>
          <div class="icon"><i class="fas fa-user"></i></div>
        </div>
        <div class="input_box">
          <input type="password" placeholder="Mật khẩu" required>
          <div class="icon"><i class="fas fa-lock"></i></div>
        </div>
        <div class="option_div">
          <div class="check_box">

            <span><a href="">Đăng nhập nhân viên</a></span>
          </div>
          <div class="forget_div">
            <a href="#">Quên mật khẩu</a>
          </div>
        </div>
        <div class="input_box button">
          <input type="submit" value="Login">
        </div>
        <div class="sign_up">
          Đăng ký tài khoản <a href="#">Signup now</a>
        </div>
      </form>
    </div>
    <!-- partial -->
  <?php
  } else {
    $currentUser = $_SESSION['current_user'];
  ?>
    <div class="box-content">
      <!-- <img src="<?= $currentUser['anh'] ?>" alt="" class="img"></br> -->
      Xin chào <?= $currentUser['hoten'] ?><br />
      <a href="./trangchu.php">Trang chủ</a>
      <a href="./dangxuat.php">
        <p>Đăng xuất</p>
      </a>
    </div>
  <?php } ?>
</body>

</html>