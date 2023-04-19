<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../resources/css/style_admin.css">
  <link rel="stylesheet" href="../resources/css/order_listing.css">
  <link rel="stylesheet" href="../resources/css/product_listing.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../resources/library/ckeditor/ckeditor.js"></script>
</head>

<body>
  <?php
  session_start();
  include '../config/connect.php';
  include '../resources/function/function.php';
  if (!empty($_SESSION['current_user'])) { //Kiểm tra xem đã đăng nhập chưa?
    $currentUser = $_SESSION['current_user'];
  ?>
    <!-- Begin:Header -->
    <div class="sidebar">
      <div class="logo-details">
        <a class="icon" href="#">
          <!-- <div class="icon"> -->
          <img class="icon" src="../<?= $currentUser['image'] ?>" alt="<?= $currentUser['fullname'] ?>">
          <!-- </div> -->
        </a>
        <a class="fullname" href="edit.php">
          <div class="logo_name"><?= $currentUser['fullname'] ?></div>
        </a>
        <i class='bx bx-menu' id="btn"></i>
        <!-- <audio controls autoplay>
          <source src="../resources/music/TayTo-MCKRPTRPTPhongKhin-6984700.mp3">
        </audio> -->
      </div>
      <ul class="nav-list">
        <!-- <li>
          <i class='bx bx-search'></i>
          <input type="text" placeholder="Search...">
          <span class="tooltip">Search</span>
        </li> -->
        <li>
          <a href="dashboard.php">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Bảng điều khiển</span>
          </a>
          <span class="tooltip">Bảng điều khiển</span>
        </li>
        <?php if (checkPrivilege('menu_listing.php')) { ?>
          <li>
            <a href="menu_listing.php">
              <i class='bx bx-list-ul'></i>
              <span class="links_name">Danh mục</span>
            </a>
            <span class="tooltip">Danh mục</span>
          </li>
        <?php } ?>
        <?php if (checkPrivilege('order_listing.php')) { ?>
          <li>
            <a href="order_listing.php">
              <i class='bx bx-cart-alt'></i>
              <span class="links_name">Đơn hàng</span>
            </a>
            <span class="tooltip">Đơn hàng</span>
          </li>
        <?php } ?>
        <?php if (checkPrivilege('product_listing.php')) { ?>
          <li>
            <a href="product_listing.php">
              <i class='bx bx-package'></i>
              <span class="links_name">Sản Phẩm</span>
            </a>
            <span class="tooltip">Sản phẩm</span>
          </li>
        <?php } ?>
        <?php if (checkPrivilege('member_listing.php')) { ?>
          <li>
            <a href="member_listing.php">
              <i class='bx bx-user'></i>
              <span class="links_name">Thành viên</span>
            </a>
            <span class="tooltip">Thành viên</span>
          </li>
        <?php } ?>
        <!-- <li>
          <a href="#">
            <i class='bx bx-cart-alt'></i>
            <span class="links_name">Order</span>
          </a>
          <span class="tooltip">Order</span>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-heart'></i>
            <span class="links_name">Saved</span>
          </a>
          <span class="tooltip">Saved</span>
        </li> -->
        <li>
          <a href="#">
            <i class='bx bx-cog'></i>
            <span class="links_name">Cài đặt</span>
          </a>
          <span class="tooltip">Cài đặt</span>
        </li>
        <a href="./logout.php">
          <li class="profile">
            <div class="profile-details">
              <!-- <img src="profile.jpg" alt="profileImg"> -->
              <div class="name_job">
                <div class="name">Đăng xuất</div>
                <div class="job">Hẹn gặp lại bạn</div>
              </div>
            </div>
            <i class='bx bx-log-out' id="log_out"></i>
          </li>
        </a>

      </ul>
    </div>
    <!-- End: Header -->
    <script src="../resources/javascript/script.js"></script>

  <?php } ?>
</body>

</html>