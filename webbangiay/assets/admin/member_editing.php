<?php
include 'header.php';
if (!empty($_SESSION['current_user'])) {
?>
	<section class="home-section">
		<div class="member_editing">
			<h1><?= !empty($_GET['id']) ? "Sửa thành viên" : "Thêm thành viên" ?></h1>
			<div id="member_editing-content-box">
				<?php
				$id = (isset($_POST['id'])) ? $_POST['id'] : 0;
				if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) {
					if (
						isset($_POST['username']) && !empty($_POST['username'])
						&& isset($_POST['password']) && !empty($_POST['password'])
						&& isset($_POST['re_password']) && !empty($_POST['re_password'])
					) {
						if (empty($_POST['username'])) {
							$error = "Bạn phải nhập tên đăng nhập";
						} elseif (empty($_POST['password'])) {
							$error = "Bạn phải nhập mật khẩu";
						} elseif (empty($_POST['re_password'])) {
							$error = "Bạn phải nhập xác nhận mật khẩu";
						} elseif ($_POST['password'] != $_POST['re_password']) {
							$error = "Mật khẩu xác nhận không khớp";
						}
						if (isset($_FILES['image']) && !empty($_FILES['image']['name'][0])) {
							$uploadedFiles = $_FILES['image'];
							$result = uploadFiles($uploadedFiles);
							if (!empty($result['errors'])) {
								$error = $result['errors'];
							} else {
								$image = $result['path'];
							}
						}
						if (!isset($image) && !empty($_POST['image'])) {
							$image = $_POST['image'];
						}
						if (isset($_FILES['gallery']) && !empty($_FILES['gallery']['name'][0])) {
							$uploadedFiles = $_FILES['gallery'];
							$result = uploadFiles($uploadedFiles);
							if (!empty($result['errors'])) {
								$error = $result['errors'];
							} else {
								$galleryImages = $result['uploaded_files'];
							}
						}
						if (!empty($_POST['gallery_image'])) {
							$galleryImages = array_merge($galleryImages, $_POST['gallery_image']);
						}
						if (!isset($error)) {
							$checkExistUser = mysqli_query($con, "SELECT * FROM `user` WHERE `username` = '" . $_POST['username'] . "'");
							if ($checkExistUser->num_rows != 0) { //tồn tại user rồi
								$error = "Username đã tồn tại. Bạn vui lòng chọn username khác";
							} else {
								if ($_GET['action'] == 'edit' && !empty($_GET['id'])) { //Cập nhật lại thành viên
									$result = mysqli_query($con, "UPDATE `user` SET `fullname` = '" . $_POST['fullname'] . "', `password` = MD5('" . $_POST['password'] . "'),`birthday` = '" . $_POST['birthday'] . "',`image` =  '" . $image . "', `last_updated` = " . time() . " WHERE `user`.`id` = " . $_GET['id']);
								} else { //Thêm thành viên
									$result = mysqli_query($con, "INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `birthday`, `image`, `created_time`, `last_updated`) VALUES (NULL,'" . $_POST['username'] . "', MD5('" . $_POST['password'] . "'), '" . $_POST['fullname'] . "','" . $_POST['birthday'] . "', '" . $image . "', " . time() . ", " . time() . ");");
								}
								if (isset($result) && empty($result)) { //Nếu có lỗi xảy ra
									$error = "Có lỗi xảy ra trong quá trình thực hiện.";
								} else { //Nếu thành công
									if (!empty($galleryImages)) {
										$user_id = ($_GET['action'] == 'edit' && !empty($_GET['id'])) ? $_GET['id'] : $con->insert_id;
										$insertValues = "";
										foreach ($galleryImages as $path) {
											if (empty($insertValues)) {
												$insertValues = "(NULL, " . $user_id . ", '" . $path . "', " . time() . ", " . time() . ")";
											} else {
												$insertValues .= ",(NULL, " . $user_id . ", '" . $path . "', " . time() . ", " . time() . ")";
											}
										}
										$result = mysqli_query($con, "INSERT INTO `image_library` (`id`, `product_id`, `path`, `created_time`, `last_updated`) VALUES " . $insertValues . ";");
									}
								}
							}
						}
					} else {
						$error = "Bạn chưa nhập thông tin thành viên.";
					}
				?>
					<div class="container">
						<div class="error"><?= isset($error) ? $error : "Cập nhật thành công" ?></div>
						<a href="member_listing.php">Quay lại danh sách thành viên</a>
					</div>
				<?php
				} else {
					if (!empty($_GET['id'])) {
						$result = mysqli_query($con, "SELECT * FROM `user` WHERE `id` = " . $_GET['id']);
						$users = $result->fetch_assoc();
					}
				?>
					<form id="editing-form-member-editing" method="POST" action="<?= !empty($users) ? "?action=edit&id=" . $_GET['id'] : "?action=add" ?>" enctype="multipart/form-data">
						<input type="submit" title="Lưu thành viên" value="" />
						<div class="clear-both"></div>
						<div class="wrap-field-member-editing">
							<label>Tên đăng nhập: </label>
							<input type="text" name="username" value="<?= (!empty($users) ? $users['username'] : "") ?>" />
							<div class="clear-both"></div>
						</div>
						<div class="wrap-field-member-editing">
							<label>Họ tên: </label>
							<input type="text" name="fullname" value="<?= !empty($users) ? $users['fullname'] : "" ?>" />
							<div class="clear-both"></div>
						</div>
						<div class="wrap-field-member-editing">
							<label>Mật khẩu: </label>
							<input type="password" name="password" value="" />
							<div class="clear-both"></div>
						</div>
						<div class="wrap-field-member-editing">
							<label>Xác nhận mật khẩu: </label>
							<input type="password" name="re_password" value="" />
							<div class="clear-both"></div>
						</div>
						<div class="wrap-field-member-editing">
							<label>Ngày sinh: </label>
							<input type="date" name="birthday" value="<?= !empty($users) ? $users['birthday'] : "" ?>" />
							<div class="clear-both"></div>
						</div>
						<div class="wrap-field-product-editing">
							<label>Ảnh đại diện: </label>
							<div class="right-wrap-field-product-editing">
								<?php if (!empty($users['image'])) { ?>
									<img src="../<?= $users['image'] ?>" /><br />
									<input type="hidden" name="image" value="<?= $users['image'] ?>" />
								<?php } ?>
								<input type="file" name="image" />
							</div>
							<div class="clear-both"></div>
						</div>
					</form>
					<div class="clear-both"></div>
					<script>
						// Replace the <textarea id="editor1"> with a CKEditor
						// instance, using default configuration.
						CKEDITOR.replace('product-content');
					</script>
				<?php } ?>
			</div>
		</div>
	</section>
<?php
}
include './footer.php';
?>