<?php include 'header.php'; ?>

<?php
$param = "";
$sortParam = "";
$orderConditon = "";
//Tìm kiếm
$search = isset($_GET['name']) ? $_GET['name'] : "";
if ($search) {
    $where = "WHERE `name` LIKE '%" . $search . "%'";
    $param .= "name=" . $search . "&";
    $sortParam = "name=" . $search . "&";
}

//Sắp xếp
$orderField = isset($_GET['field']) ? $_GET['field'] : "";
$orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
if (!empty($orderField) && !empty($orderSort)) {
    $orderConditon = "ORDER BY `product`.`" . $orderField . "` " . $orderSort;
    $param .= "field=" . $orderField . "&sort=" . $orderSort . "&";
}

include './assets/config/connect.php';
$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 12;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
$offset = ($current_page - 1) * $item_per_page;
if ($search) {
    $products = mysqli_query($con, "SELECT * FROM `product` WHERE `name` LIKE '%" . $search . "%' " . $orderConditon . "  LIMIT " . $item_per_page . " OFFSET " . $offset);
    $totalRecords = mysqli_query($con, "SELECT * FROM `product` WHERE `name` LIKE '%" . $search . "%'");
} else {
    $products = mysqli_query($con, "SELECT * FROM `product` " . $orderConditon . " LIMIT " . $item_per_page . " OFFSET " . $offset);
    $totalRecords = mysqli_query($con, "SELECT * FROM `product`");
}
$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $item_per_page);
?>
<section class="home-content">
    <section class="main">
        <section id="product-slide" class="carouseller">
            <a href="javascript:void(0)" class="carouseller__left">‹</a>
            <div class="carouseller__wrap">
                <div class="carouseller__list">
                    <div class="car__12">
                        <section class="background-slide" style="background: #FFCCFF;"></section>
                        <section class="wrap-slide">
                            <section class="slide-left">
                                <section class="product-name">
                                    <span>Xu</span><span>Hướng</span><span class="last-span">Mới</span>
                                    <section class="clear-both"></section>
                                </section>
                                <section class="wrap-button">
                                    
                                    <section class="content-buy-button">
                                       
                                    </section>
                                    
                                    <section class="clear-both"></section>
                                </section>
                            </section>
                            
                            <section class="slide-right">
                                <img src="./assets/resources/images/anh1.png" />
                            </section>
                        </section>
                    </div>
                    <div class="car__12">
                        <section class="background-slide" style="background: #00FFCC;"></section>
                        <section class="wrap-slide">
                            <section class="slide-left">
                                <section class="product-name">
                                    <span>Tạo</span><span>Cá</span><span class="last-span">Tính</span>
                                    <section class="clear-both"></section>
                                </section>
                                <section class="wrap-button">
                                    
                                    <section class="content-buy-button">
                                       
                                    </section>
                                    
                                    <section class="clear-both"></section>
                                </section>
                            </section>
                            <section class="slide-right">
                                <img src="./assets/resources/images/anh2.png" />
                            </section>
                        </section>
                    </div>
                </div>
            </div>
            <a href="javascript:void(0)" class="carouseller__right">›</a>
        </section>
        <section id="hot-products">
            <section class="container">
                <section class="heading-title">
                    <h2>Sản phẩm <span>Nổi bật</span></h2>
                    <form id="product-search" action="#" method="GET">
                        <input type="submit" value="">
                        <input type="text" value="<?= isset($_GET['name']) ? $_GET['name'] : "" ?>" name="name" placeholder="Tìm kiếm" />
                    </form>
                    <!-- <a href="#"><img src="./assets/resources/images/arrow.png" />Xem tất cả</a> -->
                    <section class="clear-both"></section>
                </section>
                <section class="box-content">
                    <?php
                    $num = 1;
                    while ($row = mysqli_fetch_array($products)) {
                    ?>
                        <section class="product-item <?php if ($num % 4 == 1) { ?> first-line <?php } ?> ">
                            <section class="brand-icon"><img src="./assets/resources/images/nike-icon.png" /></section>
                            <section class="product-image"><a href="detail.php?id=<?= $row['id'] ?>"><img src="./assets/<?= $row['image'] ?>" title="<?= $row['name'] ?>" /></a></section>
                            <section class="product-name"><a href="detail.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></section>
                            <section class="wrap-button">
                                <section class="left-buy-button"></section>
                                <section class="content-buy-button">
                                    <?php if ($row['quantity'] > 0) { ?>
                                        <section class="product-price"><?= number_format($row['price'], 0, ",", ".") ?> đ</section>
                                        <form class="quick-buy-form" action="cart.php?action=add" method="POST">
                                            <input type="hidden" value="1" name="quantity[<?= $row['id'] ?>]" />
                                            <input type="submit" value="Mua ngay" />
                                        </form>
                                    <?php } else { ?>
                                        <a href="#">Hết hàng</a>
                                    <?php } ?>
                                </section>
                                <section class="right-buy-button"></section>
                                <section class="clear-both"></section>
                            </section>
                        </section>
                    <?php
                        $num++;
                    }
                    ?>
                    <?php 
                    ?>
                    <section class="clear-both"></section>
                </section>
            </section>
        </section>
    </section>
</section>
<?php include("footer.php"); ?>