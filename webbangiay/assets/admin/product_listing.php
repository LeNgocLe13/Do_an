<?php
include 'header.php';
$config_name = "product";
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
  $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 12;
  $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
  $offset = ($current_page - 1) * $item_per_page;
  if (!empty($where)) {
    $totalRecords = mysqli_query($con, "SELECT * FROM `product` where (" . $where . ")");
  } else {
    $totalRecords = mysqli_query($con, "SELECT * FROM `product`");
  }
  $totalRecords = $totalRecords->num_rows;
  $totalPages = ceil($totalRecords / $item_per_page);
  if (!empty($where)) {
    $products = mysqli_query($con, "SELECT * FROM `product` where (" . $where . ") ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
  } else {
    $products = mysqli_query($con, "SELECT * FROM `product` ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
  }
  mysqli_close($con);
?>
  <!-- Begin:Product_listing -->
  <section class="home-section">
    <!-- <main class="main"> -->
      <div class="product_listing">
        <h1>Danh sách sản phẩm</h1>
        <div class="product-items" style="width: 100%"; >
          <?php if (checkPrivilege($config_name . '_editing.php')) { ?>
            <div class="buttons">
              <a href="./<?= $config_name ?>_editing.php">Thêm <?= $config_title ?></a>
            </div>
          <?php } ?>
          <div class="product-search">
            <form id="<?= $config_name ?>-search-form" action="<?= $config_name ?>_listing.php?action=search" method="POST">
              <fieldset>
                <legend>Tìm kiếm <?= $config_title ?>:</legend>
                ID: <input type="text" name="id" value="<?= !empty($id) ? $id : "" ?>" />
                Tên <?= $config_title ?>: <input type="text" name="name" value="<?= !empty($name) ? $name : "" ?>" />
                <input type="submit" value="Tìm" />
              </fieldset>
            </form>
          </div>
          <div class="total-products">
            <span>Có tất cả <strong><?= $totalRecords ?></strong> sản phẩm trên <strong><?= $totalPages ?></strong> trang</span>
          </div>
          <ul>
            <li class="product-item-heading">
              <div class="product-prop product-id">Id</div>
              <div class="product-prop product-img">Ảnh sản phẩm</div>
              <div class="product-prop product-name">Tên sản phẩm</div>
              <div class="product-prop product-content">Mô tả sản phẩm</div>
              <div class="product-prop product-quantity">Số lượng </div>
              <div class="product-prop product-price">Giá bán </div>
              <div class="product-prop product-time">Ngày tạo</div>
              <div class="product-prop product-time">Ngày cập nhật</div>
              <?php if (checkPrivilege($config_name . '_editing.php?id=0')) { ?>
                <div class="product-prop product-button">
                  Sửa
                </div>
              <?php } ?>
              <?php if (checkPrivilege($config_name . '_delete.php?id=0')) { ?>
                <div class="product-prop product-button">
                  Xóa
                </div>
              <?php } ?>
              <div class="clear-both"></div>
            </li>
            <?php
            while ($row = mysqli_fetch_array($products)) {
            ?>
              <li>
                <div class="product-prop product-id"><?= $row['id'] ?></div>
                <div class="product-prop product-img"><img src="../<?= $row['image'] ?>" alt="<?= $row['name'] ?>" title="<?= $row['name'] ?>" /></div>
                <div class="product-prop product-name"><?= $row['name'] ?></div>
                <div class="product-prop product-content"><?= $row['content'] ?></div>
                <div class="product-prop product-quantity"><?= $row['quantity'] ?></div>
                <div class="product-prop product-price"><?= $row['price'] ?></div>
                <div class="product-prop product-time"><?= date('H:i d-m-Y', $row['created_time']) ?></div>
                <div class="product-prop product-time"><?= date('H:i d-m-Y', $row['last_updated']) ?></div>
                <?php if (checkPrivilege($config_name . '_editing.php?id=' . $row['id'])) { ?>
                  <div class="listing-prop product-button">
                    <a href="./<?= $config_name ?>_editing.php?id=<?= $row['id'] ?>">Sửa</a>
                  </div>
                <?php } ?>
                <?php if (checkPrivilege($config_name . '_delete.php?id=' . $row['id'])) { ?>
                  <div class="listing-prop product-button">
                    <a href="./<?= $config_name ?>_delete.php?id=<?= $row['id'] ?>" onclick="return confirm('bạn thật sự muốn xóa ?');">Xóa</a>
                  </div>
                <?php } ?>
                <div class=" clear-both">
                </div>
              </li>
            <?php } ?>
          </ul>
          <?php
          include './pagination.php';
          ?>
          <div class="clear-both"></div>
        </div>
      </div>
    <!-- </main> -->
  </section>
  <!-- End:Product_listing -->
<?php
}
include './footer.php';
?>