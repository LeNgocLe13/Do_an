<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../resources/css/edit.css">
</head>

<body>
  <?php
  include '../config/connect.php';
  $error = false;
  if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    if (
      isset($_POST['user_id']) && !empty($_POST['user_id']) && isset($_POST['old_password']) && !empty($_POST['old_password']) && isset($_POST['new_password']) && !empty($_POST['new_password'])
    ) {
      $userResult = mysqli_query($con, "Select * from `user` WHERE (`id` = " . $_POST['user_id'] . " AND `password` = '" . md5($_POST['old_password']) . "')");
      if ($userResult->num_rows > 0) {
        $result = mysqli_query($con, "UPDATE `user` SET `password` = MD5('" . $_POST['new_password'] . "'), `last_updated`=" . time() . " WHERE (`id` = " . $_POST['user_id'] . " AND `password` = '" . md5($_POST['old_password']) . "')");
        if (!$result) {
          $error = "Không thể cập nhật tài khoản";
        }
      } else {
        $error = "Mật khẩu cũ không đúng.";
      }
      mysqli_close($con);
      if ($error !== false) {
  ?>
        <div id="error-notify" class="box-content">
          <h1>Thông báo</h1>
          <h4><?= $error ?></h4>
          <a href="./edit.php">Đổi lại mật khẩu</a>
        </div>
      <?php } else { ?>
        <div id="edit-notify" class="box-content">
          <h1><?= ($error !== false) ? $error : "Sửa tài khoản thành công" ?></h1>
          <a href="./index.php">Quay lại tài khoản</a>
        </div>
      <?php } ?>
    <?php } else { ?>
      <div id="edit-notify" class="box-content">
        <h1>Vui lòng nhập đủ thông tin để sửa tài khoản</h1>
        <a href="./edit.php">Quay lại sửa tài khoản</a>
      </div>
    <?php
    }
  } else {
    session_start();
    $user = $_SESSION['current_user'];
    if (!empty($user)) {
    ?>
      <div class="login-box">
        <h2>Xin chào "<?= $user['fullname'] ?>" Bạn đang thay đổi mật khẩu</h2>
        <form action="./doimatkhau.php?action=edit" method="Post" autocomplete="off">
          <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
          <div class="user-box">
            <input type="password" name="old_password" required="">
            <label>Mật khẩu cũ</label>
          </div>
          <div class="user-box">
            <input type="text" name="new_password" required="">
            <label>Mật khẩu mới</label>
          </div>
          <div class="submit">
            <button type="submit" value="submit">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              đổi mật khẩu
            </button>
          </div>
        </form>
      </div>
  <?php
    }
  }
  ?>
</body>

</html>