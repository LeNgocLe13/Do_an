<?php
include 'header.php';
if (!empty($_SESSION['current_user'])) {
?>
  <!-- Begin:Order_delete -->
  <section class="home-section">
    <div class="main-content">
      <h1>Xóa đơn hàng</h1>
      <div id="delete-box">
        <?php
        $error = false;
        if (isset($_GET['id']) && !empty($_GET['id'])) {
          include '../config/connect.php';
          $result = mysqli_query($con, "DELETE FROM `orders` WHERE `id` = " . $_GET['id']);
          if (!$result) {
            $error = "Không thể xóa đơn hàng.";
          }
          mysqli_close($con);
          if ($error !== false) {
        ?>
            <div id="error-notify" class="delete-content">
              <h2>Thông báo</h2>
              <h3><?= $error ?></h3>
              <h3><a href="./order_listing.php">Danh sách đơn hàng</a></h3>
            </div>
          <?php } else { ?>
            <div id="success-notify" class="delete-content">
              <h2>Xóa đơn hàng thành công</h2>
              <h3><a href="./order_listing.php">Danh sách đơn hàng</a></h3>
            </div>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </section>
  <!-- End:Order_delete -->
<?php
}
include 'footer.php';
?>