<?php
include 'header.php';
$config_name = "order";
$config_title = "sản phẩm";
if (!empty($_SESSION['current_user'])) {
  if (!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)) {
    $_SESSION[$config_name . '_filter'] = $_POST;
    header('Location: ' . $config_name . '_listing.php');
    exit;
  }
  if (!empty($_SESSION[$config_name . '_filter'])) {
    $where = "";
    foreach ($_SESSION[$config_name . '_filter'] as $field => $value) {
      if (!empty($value)) {
        switch ($field) {
          case 'name':
            $where .= (!empty($where)) ? " AND " . "`" . $field . "` LIKE '%" . $value . "%'" : "`" . $field . "` LIKE '%" . $value . "%'";
            break;
          default:
            $where .= (!empty($where)) ? " AND " . "`" . $field . "` = " . $value . "" : "`" . $field . "` = " . $value . "";
            break;
        }
      }
    }
    extract($_SESSION[$config_name . '_filter']);
  }
  $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
  $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
  $offset = ($current_page - 1) * $item_per_page;
  if (!empty($where)) {
    $totalRecords = mysqli_query($con, "SELECT * FROM `orders` where (" . $where . ")");
  } else {
    $totalRecords = mysqli_query($con, "SELECT * FROM `orders`");
  }
  $totalRecords = $totalRecords->num_rows;
  $totalPages = ceil($totalRecords / $item_per_page);
  if (!empty($where)) {
    $orders = mysqli_query($con, "SELECT * FROM `orders` where (" . $where . ") ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
  } else {
    $orders = mysqli_query($con, "SELECT * FROM `orders` ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
  }
  mysqli_close($con);
?>
  <!-- Begin: Order_listing -->
  <section class="home-section">
    <div class="order_listing">
      <h1>Danh sách <?= $config_title ?></h1>
      <div class="order-items" style="width: 100%;">
        <div class="buttons">
          <!-- <a href="./<?= $config_name ?>_editing.php">Thêm <?= $config_title ?></a> -->
        </div>
        <div class="listing-search">
          <form id="<?= $config_name ?>-search-form" action="<?= $config_name ?>_listing.php?action=search" method="POST">
            <fieldset>
              <legend>Tìm kiếm <?= $config_title ?>:</legend>
              ID: <input type="text" name="id" value="<?= !empty($id) ? $id : "" ?>" />
              Tên <?= $config_title ?>: <input type="text" name="name" value="<?= !empty($name) ? $name : "" ?>" />
              <input type="submit" value="Tìm" />
            </fieldset>
          </form>
        </div>
        <div class="total-items">
          <?php /*
          <span>Có tất cả <strong><?=$totalRecords?></strong> <?=$config_title?> trên <strong><?=$totalPages?></strong> trang</span> */ ?>
        </div>
        <ul>
          <li class="order-item-heading">
            <div class="order-prop order-id">ID</div>
            <div class="order-prop order-name">Tên người nhận</div>
            <div class="order-prop order-address">Địa chỉ</div>
            <div class="order-prop order-phone">Điện thoại</div>
            <div class="order-prop order-time">Ngày tạo</div>
            <div class="order-prop order-button">
              In đơn
            </div>
            <div class="order-prop order-button">
              Sửa
            </div>
            <div class="order-prop order-button">
              Xoá
            </div>
            <div class="clear-both"></div>
          </li>
          <?php while ($row = mysqli_fetch_array($orders)) { ?>
            <li>
              <div class="order-prop order-id"><?= $row['id'] ?></div>
              <div class="order-prop order-name"><?= $row['name'] ?></div>
              <div class="order-prop order-address"><?= $row['address'] ?></div>
              <div class="order-prop order-phone"><?= $row['phone'] ?></div>
              <div class="order-prop order-time"><?= date('d/m/Y H:i', $row['created_time']) ?></div>
              <div class="order-prop order-button">
                <a href="order_printing.php?id=<?= $row['id'] ?>" target="_blank">In</a>
              </div>
              <div class="order-prop order-button">
                <a href="./<?= $config_name ?>_editing.php?id=<?= $row['id'] ?>">Sửa</a>
              </div>
              <div class="order-prop order-button">
                <a href="./<?= $config_name ?>_delete.php?id=<?= $row['id'] ?>" onclick="return confirm('bạn thật sự muốn xóa ?');">Xóa</a>
              </div>
              <div class="clear-both"></div>
            </li>
          <?php  } ?>
        </ul>
        <?php /*
              include './pagination.php';
             */ ?>
        <div class="clear-both"></div>
      </div>
    </div>
  </section>
  <!-- End: Order_listing -->
<?php
}
include './footer.php';
?>