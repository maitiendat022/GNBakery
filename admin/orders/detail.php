<?php
require_once '../check_admin_signin.php';
$page = "orders";
require_once '../navbar-vertical.php';
require_once '../../database/connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM order_product
join products on order_product.product_id = products.id
WHERE order_id = '$id'";
$result = mysqli_query($connect, $sql);
$sum = 0;
?>
<div class="main__container">
    <div class="main-container-text d-flex align-items-center">
        <a class="header__name text-decoration-none" href="#">
            Chi Tiết Đơn Hàng
        </a>
    </div>

    <div class="container-fluid px-4">
        <div class="row gx-5">
            <div class="col-12">
                <div class="table-responsive-sm">
                    <table class="product_table table table-sm table-light table-hover align-middle">
                        <thead style="text-align : center;">
                            <tr>
                                <th class="name-product" scope="col">Tên sản phẩm</th>
                                <th class="pic-product" scope="col">Ảnh</th>
                                <th class="price-product" scope="col">Giá</th>
                                <th class="amount-product" scope="col">Số lượng</th>
                                <th class="payment" scope="col">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody style="text-align:center;">
                            <?php foreach($result as $each) { ?>
                                <tr>
                                    <th class="detail_product-item" scope="col">
                                        <?= $each['name'] ?>
                                    </th>
                                    <th class="detail_product-item" scope="col">
                                        <img class="img_prd" src="../../assets/images/products/<?= $each['image'] ?>" alt="">
                                    </th>
                                    <th class="detail_product-item" style="font-weight:600; font-family: Roboto;" scope="col">
                                    <?= number_format($each['price'], 0, '.', ' ') ?>&#8363
                                    </th>
                                    <th class="detail_product-item" scope="col">x<?= $each['quantity'] ?></th>
                                    <th class="detail_product-item" scope="col" style="font-weight:600; font-family: Roboto;">
                                    <?php 
                                        $result = $each['price'] * $each['quantity'];
                                        $sum += $result;
                                        echo number_format($result, 0, '.', ' ');
                                    ?>&#8363
                                    </th>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="total-payments">
            <span class="t-pay">Tổng tiền Thanh Toán </span>
            <span class="t-money"><?= number_format($sum, 0, '.', ' ') ?>&#8363</span>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
 
    $('.btn-menu').click(function() {
        $('.navbar-vertical-mobile').toggle("fast");
        $('.header__navbar-overlay').toggle("fast");
    });

</script>

</body>

</html>