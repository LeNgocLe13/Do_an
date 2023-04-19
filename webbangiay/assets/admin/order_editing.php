<?php
include 'header.php';
if (!empty($_SESSION['current_user'])) {
?>
	<section class="home-section">
		<div class="member_editing">
			<h1><?= !empty($_GET['id']) ? "Sửa đơn hàng" : "Thêm đơn hàng" ?></h1>
			<div id="member_editing-content-box">
				<?php
				$id = (isset($_POST['id'])) ? $_POST['id'] : 0;
				if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) {
					if (
						isset($_POST['name']) && !empty($_POST['name'])
						&& isset($_POST['phone']) && !empty($_POST['phone'])
						&& isset($_POST['address']) && !empty($_POST['address'])
					) {
						if (empty($_POST['name'])) {
							$error = "Bạn phải nhập tên người mua";
						} elseif (empty($_POST['phone'])) {
							$error = "Bạn phải nhập số điện thoại";
						} elseif (empty($_POST['address'])) {
							$error = "Bạn phải nhập địa chỉ";
						}
						if (!isset($error)) {

							if ($_GET['action'] == 'edit' && !empty($_GET['id'])) { //Cập nhật lại thành viên
								$result = mysqli_query($con, "UPDATE `orders` SET `name` = '" . $_POST['name'] . "', `phone` = '" . $_POST['phone'] . "', `mail` = '" . $_POST['mail'] . "', `address` = '" . $_POST['address'] . "', `note` = '" . $_POST['note'] . "', `last_updated` = " . time() . " WHERE `orders`.`id` =" . $_GET['id']);
							}
							// else { //Thêm thành viên
							// 	$result = mysqli_query($con, "INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `birthday`, `image`, `created_time`, `last_updated`) VALUES (NULL,'" . $_POST['username'] . "', MD5('" . $_POST['password'] . "'), '" . $_POST['fullname'] . "','" . $_POST['birthday'] . "', '" . $image . "', " . time() . ", " . time() . ");");
							// }
							if (isset($result) && empty($result)) { //Nếu có lỗi xảy ra
								$error = "Có lỗi xảy ra trong quá trình thực hiện.";
							}
						}
					} else {
						$error = "Bạn chưa nhập thông tin người mua.";
					}
				?>
					<div class="container">
						<div class="error"><?= isset($error) ? $error : "Cập nhật thành công" ?></div>
						<a href="order_listing.php">Quay lại danh sách đặt hàng</a>
					</div>
				<?php
				} else {
					if (!empty($_GET['id'])) {
						$result = mysqli_query($con, "SELECT * FROM `orders` WHERE `id` = " . $_GET['id']);
						$order = $result->fetch_assoc();
					}
				?>
					<form id="editing-form-member-editing" method="POST" action="<?= !empty($order) ? "?action=edit&id=" . $_GET['id'] : "?action=add" ?>" enctype="multipart/form-data">
						<input type="submit" title="Lưu đơn hàng" value="">
						<div class="clear-both"></div>
						<div class="wrap-field-member-editing">
							<label>Tên người mua: </label>
							<input type="text" name="name" value="<?= (!empty($order) ? $order['name'] : "") ?>">
							<div class="clear-both"></div>
						</div>
						<div class="wrap-field-member-editing">
							<label>Số điện thoại: </label>
							<input type="text" name="phone" value="<?= !empty($order) ? $order['phone'] : "" ?>">
							<div class="clear-both"></div>
						</div>
						<div class="wrap-field-member-editing">
							<label>Email: </label>
							<input type="mail" name="mail" value="<?= !empty($order) ? $order['mail'] : "" ?>">
							<div class="clear-both"></div>
						</div>
						<div class="wrap-field-member-editing">
							<label>Địa chỉ người nhận: </label>
							<input type="address" name="address" value="<?= !empty($order) ? $order['address'] : "" ?>">
							<div class="clear-both"></div>
						</div>
						<div class="wrap-field-member-editing">
							<label>Ghi chú: </label>
							<textarea name="note" id="order-note"><?= (!empty($order) ? $order['note'] : "") ?></textarea>
							<!-- <input type="note" name="note" value="<?= !empty($order) ? $order['note'] : "" ?>"> -->
							<div class="clear-both"></div>
						</div>
					</form>
					<div class="clear-both"></div>
					<script>
						// Replace the <textarea id="editor1"> with a CKEditor
						// instance, using default configuration.
						CKEDITOR.replace('order-note');
					</script>
				<?php } ?>
			</div>
		</div>
	</section>
<?php
}
include './footer.php';
?>