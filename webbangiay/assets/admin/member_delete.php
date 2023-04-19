<?php
include 'header.php';
if (!empty($_SESSION['current_user'])) {
?>
  <!-- Begin:Member_delete -->
  <section class="home-section">
    <div class="main-content">
      <h1>Xóa thành viên</h1>
      <div id="delete-box">
        <?php
        $error = false;
        if (isset($_GET['id']) && !empty($_GET['id'])) {
          include '../config/connect.php';
          $result = mysqli_query($con, "DELETE FROM `user` WHERE `id` = " . $_GET['id']);
          if (!$result) {
            $error = "Không thể xóa thành viên.";
          }
          mysqli_close($con);
          if ($error !== false) {
        ?>
            <div id="error-notify" class="delete-content">
              <h2>Thông báo</h2>
              <h3><?= $error ?></h3>
              <h3><a href="./member_listing.php">Danh sách thành viên</a></h3>
            </div>
          <?php } else { ?>
            <div id="success-notify" class="delete-content">
              <h2>Xóa thành viên thành công</h2>
              <h3><a href="./member_listing.php">Danh sách thành viên</a></h3>
            </div>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </section>
  <!-- End:Member_delete -->
<?php
}
include 'footer.php';
?>