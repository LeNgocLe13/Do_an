<?php
include 'header.php';
$config_name = "member";
$config_title = "thành viên";
if (!empty($_SESSION['current_user'])) {
	if (!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)) {
		$_SESSION[$config_name . '_filter'] = $_POST;
		header('Location: ' . $config_name . '_listing.php');
		exit;
	}
	$where = "id != " . $_SESSION['current_user']['id'];
	if (!empty($_SESSION[$config_name . '_filter'])) {
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
		extract($_SESSION[$config_name .'_filter']);
	}
	$item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
	$current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
	$offset = ($current_page - 1) * $item_per_page;
	if (!empty($where)) {
		$totalRecords = mysqli_query($con, "SELECT * FROM `user` where (" . $where . ")");
	} else {
		$totalRecords = mysqli_query($con, "SELECT * FROM `user`");
	}
	$totalRecords = $totalRecords->num_rows;
	$totalPages = ceil($totalRecords / $item_per_page);
	if (!empty($where)) {
		$products = mysqli_query($con, "SELECT * FROM `user` where (" . $where . ") ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
	} else {
		$products = mysqli_query($con, "SELECT * FROM `user` ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
	}
	mysqli_close($con);
?>
	<section class="home-section">
		<div class="member_listing">
			<h1>Danh sách <?= $config_title ?></h1>
			<div class="member-items">
				<div class="buttons">
					<a href="./<?= $config_name ?>_editing.php">Thêm <?= $config_title ?></a>
				</div>
				<div class="member-search">
					<form id="<?= $config_name ?>-search-form" action="<?= $config_name ?>_listing.php?action=search" method="POST">
						<fieldset>
							<legend>Tìm kiếm <?= $config_title ?>:</legend>
							ID: <input type="text" name="id" value="<?= !empty($id) ? $id : "" ?>" />
							Tên <?= $config_title ?>: <input type="text" name="name" value="<?= !empty($name) ? $name : "" ?>" />
							<input type="submit" value="Tìm" />
						</fieldset>
					</form>
				</div>
				<div class="member-total">
					<span>Có tất cả <strong><?= $totalRecords ?></strong> <?= $config_title ?> trên <strong><?= $totalPages ?></strong> trang</span>
				</div>
				<ul>
					<li class="member-item-heading">
						<div class="member-prop member-username">Tên đăng nhập</div>
						<div class="member-prop member-fullname">Họ tên</div>
						<div class="member-prop member-time">Ngày tạo</div>
						<div class="member-prop member-time">Ngày cập nhật</div>
						<div class="member-prop member-privilege">
							Phân quyền
						</div>
						<div class="member-prop member-button">
							Sửa
						</div>
						<div class="member-prop member-button">
							Xóa
						</div>
						<div class="clear-both"></div>
					</li>
					<?php
					while ($row = mysqli_fetch_array($products)) {
					?>
						<li>
							<div class="member-prop member-username"><?= $row['username'] ?></div>
							<div class="member-prop member-fullname"><?= $row['fullname'] ?></div>
							<div class="member-prop member-time"><?= date('d/m/Y H:i', $row['created_time']) ?></div>
							<div class="member-prop member-time"><?= date('d/m/Y H:i', $row['last_updated']) ?></div>
							<div class="member-prop member-privilege">
								<a href="./<?= $config_name ?>_privilege.php?id=<?= $row['id'] ?>">Phân quyền</a>
							</div>
							<div class="member-prop member-button">
								<a href="./<?= $config_name ?>_editing.php?id=<?= $row['id'] ?>">Sửa</a>
							</div>
							<div class="member-prop member-button">
								<a href="./<?= $config_name ?>_delete.php?id=<?= $row['id'] ?>" onclick="return confirm('bạn thật sự muốn xóa ?');">Xóa</a>
							</div>
							<div class="clear-both"></div>
						</li>
					<?php } ?>
				</ul>
				<?php
				include './pagination.php';
				?>
				<div class="clear-both"></div>
			</div>
		</div>

	</section>
<?php
}
include './footer.php';
?>