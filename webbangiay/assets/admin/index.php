<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
  <link rel="stylesheet" href="../resources/css/login.css">
</head>

<body>
  <?php
  session_start();
  include '../config/connect.php';
  $error = false;
  if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
    $result = mysqli_query($con, "Select * from `user` WHERE (`username` ='" . $_POST['username'] . "' AND `password` = md5('" . $_POST['password'] . "'))");
    if (!$result) {
      $error = mysqli_error($con);
    } else {
      $user = mysqli_fetch_assoc($result);
      $userPrivileges = mysqli_query($con, "SELECT * FROM `user_privilege` INNER JOIN `privilege` ON user_privilege.privilege_id = privilege.id WHERE user_privilege.user_id = " . $user['id']);
      $userPrivileges = mysqli_fetch_all($userPrivileges, MYSQLI_ASSOC);
      if (!empty($userPrivileges)) {
        $user['privileges'] = array();
        foreach ($userPrivileges as $privilege) {
          $user['privileges'][] = $privilege['url_match'];
        }
      }
      $_SESSION['current_user'] = $user;
      header('Location: dashboard.php');
    }
    if ($error !== false || $result->num_rows == 0) {
  ?>
      <div id="login-notify" class="box-content">
        <h1>Thông báo</h1>
        <h4><?= !empty($error) ? $error : "Thông tin đăng nhập không chính xác" ?></h4>
        <a href="./index.php">Quay lại</a>
      </div>
    <?php
      exit;
    }
    ?>
  <?php } ?>
  <?php if (empty($_SESSION['current_user'])) { ?>
    <div class="login-box">
      <h2>Đăng nhập</h2>
      <form action="./index.php" method="Post" autocomplete="off">
        <div class="user-box">
          <input type="text" name="username" required="">
          <label>Tài Khoản</label>
        </div>
        <div class="user-box">
          <input type="password" name="password" required="">
          <label>Mật khẩu</label>
        </div>
        <div class="submit">
          <button type="submit" value="submit">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Đăng nhập
          </button>
        </div>
      </form>
    </div>
    <!-- partial -->
  <?php
  } else {
    $currentUser = $_SESSION['current_user'];
  ?>
    <div id="login-notify" class="box-content">

    </div>
  <?php } ?>
</body>

</html>