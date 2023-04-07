<?php 
    require_once '../check_admin_signin.php';
    $page = "root";
    require_once '../navbar-vertical.php';

    require_once '../../database/connect.php';

    $sql = "select count(*) from users where level = '2'";
    $admin = mysqli_query($connect, $sql);
    $admin_quantity = mysqli_fetch_array($admin)['count(*)'];
    $sql = "select count(*) from users where level = '0'";
    $customer = mysqli_query($connect, $sql);
    $customer_quantity = mysqli_fetch_array($customer)['count(*)'];
    $sql = "select count(*) from categories";
    $category = mysqli_query($connect, $sql);
    $category_quantity = mysqli_fetch_array($category)['count(*)'];
    $sql = "select count(*) from products";
    $product = mysqli_query($connect, $sql);
    $product_quantity = mysqli_fetch_array($product)['count(*)'];
?>

        <div class="main__container">
            <div class="container-fluid px-4">
                
                <?php require_once '../error_success.php' ?>

                <div class="row gx-5">
                    <div class="col-md-3">
                        <div class="card d-flex flex-row">
                            <div class="card__content d-flex flex-column justify-content-between">
                                <h5 class="card__name">SỐ LƯỢNG BÁNH</h5> 
                                <span class="card__quantity"><?= $product_quantity ?></span>
                            </div>
                            <div class="card__icon d-flex flex-fill">
                                <i class="bi bi-vinyl-fill"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card d-flex flex-row">
                            <div class="card__content d-flex flex-column justify-content-between">
                                <h5 class="card__name">SỐ LƯỢNG LOẠI CHÍNH</h5>
                                <span class="card__quantity"><?= $category_quantity ?></span>
                            </div>
                            <div class="card__icon d-flex flex-fill">
                                <i class="bi bi-slack"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card d-flex flex-row">
                            <div class="card__content d-flex flex-column justify-content-between">
                                <h5 class="card__name">SỐ LƯỢNG NHÂN VIÊN</h5>
                                <span class="card__quantity"><?= $admin_quantity ?></span>
                            </div>
                            <div class="card__icon d-flex flex-fill">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card d-flex flex-row">
                            <div class="card__content d-flex flex-column justify-content-between">
                                <h5 class="card__name">SỐ LƯỢNG NGƯỜI DÙNG</h5>
                                <span class="card__quantity"><?= $customer_quantity ?></span>
                            </div>
                            <div class="card__icon d-flex flex-fill">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('.btn-menu').click(function() {
            $('.navbar-vertical-mobile').toggle("fast");
            $('.header__navbar-overlay').toggle("fast");
        });
    })
</script>
</body>
</html>