<?php 
    require_once '../check_admin_signin.php';
    include '../navbar-vertical.php'; 

    $id = $_GET['id'];

    require_once '../../database/connect.php';
    $sql = "select * from products, products_size where products.id = '$id' and products_size.product_id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
?>

<div class="main__container">

    <div class="product">
        <div class="product-content">
            <div class="product-content-left">
                <img class="image-img hide-on-mobile-tablet" src="../../assets/images/products/<?= $each['image'] ?>" data-zoom-image="../../assets/images/products/<?= $each['image'] ?>" />
                <img class="image-img-mobile" src="../../assets/images/products/<?= $each['image'] ?>"/>
            </div>

            <div class="product-content-right">
                <div class="product-content-right-name">
                    <h1><?= $each['name'] ?></h1>
                    <p>Mã sản phẩm: <?= $each['id'] ?></p>
                </div>
                <hr>
                
                <form action="">
                <div class="product-price">
                    <p class="line-price">
                        <span class="">Giá: </span>
                        <span class="ProductPrice" itemprop="price" content="220000">
                            <?= number_format($each['price'], 0, '.', ' ') ?>&#8363
                        </span>
                    </p>

                </div>

                <div class="product-select-swatch">
                    <div class="product-select-swatch-text">
                        <p>Kích Thước:</p>
                    </div>
                    <div class="select-swap">
                        <div class="data-one">
                            <input type="radio" name="option1" value="<?= $each['size'] ?>" class="input-opt">
                            <button for="swatch" class="sd">
                                <?= $each['size'] ?> cm
                            </button>
                        </div>
                    </div>
                </div>

                </form>
                <div class="product-actions">
                    <a href="form_update.php?id=<?= $each['id'] ?>&admin_id=<?= $each['user_id'] ?>" id="AddToCart" class="btnAddtocart">Sửa</a>
                    <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="delete.php?id=<?= $each['id'] ?>&admin_id=<?= $each['user_id'] ?>" id="buy-now" class="btnBuynow">
                    Xóa
                </a>
                </div>
            </div>
        </div>
    </div>
    <div class="product-tab">
        <div class="tab" >
            <button class="tablinks" >Mô tả chung</button>
        </div>
        <div class="content-product-tab">
            <?= nl2br($each['description']) ?>
        </div>
    </div>


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
<script>
  $(".image-img").ezPlus({
    zoomWindowFadeIn: 500,
    zoomWindowFadeOut: 500,
    lensFadeIn: 500,
    lensFadeOut: 500,
    zoomWindowWidth: 200,
    zoomWindowHeight: 200
  });
 
    $('.btn-menu').click(function() {
        $('.navbar-vertical-mobile').toggle("fast");
        $('.header__navbar-overlay').toggle("fast");
    });

</script>
<script src="../../js/product.js"></script>
</body>

</html>