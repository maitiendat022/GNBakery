<?php 
    require_once '../../check_super_admin_signin.php';
    $page = 'categories';
    require_once './navbar-vertical.php';

    if(empty($_GET['id'])) {
        $_SESSION['error'] = 'Không có dữ liệu để sửa!';
        header('location:index.php');
    }

    $id = $_GET['id'];
    require_once '../../../database/connect.php';
    $sql = "select * from category_detail where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);

    $sql = "select * from categories";
    $categories = mysqli_query($connect, $sql);

?>
    <div class="main__form">
        <div class=" container-fluid px-4">
            <?php include '../../error_success.php' ?>

            <div class="row gx-5">
                <div class="col-12">
                    <form action="process_update.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $each['id'] ?>">

                        <div class="mb-4 fs-4">
                            <label class="form-label">Loại bánh chính</label>
                            <select class="form__select form-select" id="category" name="category">
                                <?php foreach ($categories as $category) { ?>
                                    <option 
                                        <?php if($each['category_id'] == $category['id']) { ?>
                                            selected
                                        <?php    } ?>
                                        value="<?= $category['id'] ?>"
                                    >
                                        <?= $category['name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-4 fs-4">
                            <label class="form-label" for="name">Loại bánh phụ</label>
                            <input type="text" name="name" id="name" value="<?= $each['name'] ?>" class="form__input form-control" autocomplete="off"/>
                            <span id="error" class="error_input"></span>
                        </div>

                        <button type="submit" class="form__btn btn btn-dark mb-4">Sửa</button>
</div>

</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('.btn-menu').click(function() {
            $('.navbar-vertical-mobile').toggle("fast");
            $('.header__navbar-overlay').toggle("fast");
        });
    })
</script>