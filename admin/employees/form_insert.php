<?php 
    require_once '../check_admin_signin.php';

    $admin_id = $_SESSION['id'];
    $page = 'products-insert';
    require_once '../navbar-vertical.php';

    require_once '../../database/connect.php';

    $sql = "select * from categories";
    $result = mysqli_query($connect, $sql);

   
?>
    <div class="main__form">
        <div class="main-container-text d-flex align-items-center">
            <a class="header__name text-decoration-none" href="#">
                Thêm tài khoản nhân viên
            </a>
        </div>
        <div class=" container-fluid px-4">
            <?php include '../error_success.php' ?>
        
            <div class="row gx-5" style = "padding-right:1000px;padding-left:50px;">
                <div class="col-12">

                    <form action="process_insert.php" method="post" enctype="multipart/form-data">
                        <div class="mb-4 fs-4">
                            <label class="form-label" for="name">Tên</label>
                            <input type="text" name="name" id="name" class="form__input form-control" autocomplete="off"/>
                        </div>

                        <div class="mb-4 fs-4">
                            <label class="form-label" for="image">Email</label>
                            <input type="email" name="email" id="email" class="form__input form-control"/>
                        </div>
                        <div class="mb-4 fs-4">
                            <label class="form-label" for="image">Mật khẩu</label>
                            <input type="password" name="password" id="password" class="form__input form-control"/>
                        </div>
                        <div class="mb-4 fs-4">
                            <label class="form-label" for="image">Số điện thoại</label>
                            <input type="number" name="phone" id="phone" class="form__input form-control"/>
                        </div>
                        <div class="mb-4 fs-4">
                            <label class="form-label" for="image">Địa chỉ</label>
                            <input type="text" name="address" id="address" class="form__input form-control"/>
                        </div><div class="mb-4 fs-4">
                            <label class="form-label" for="image">Giới tính: </label><br>
                            <select name="gender" id="gender" class="form__input form-control">
                                <option value="">Nam</option>
                                <option value="">Nữ</option>
                            </select>
                        </div>
                        <div class="mb-4 fs-4">
                            <label class="form-label" for="image">Ngày sinh</label>
                            <input type="date" name="birthday" id="birthday" class="form__input form-control"/>
                        </div><div class="mb-4 fs-4">

                        <input type="hidden" name="admin_id" value="<?= $admin_id ?>">
                        <button type="submit" class="form__btn btn mb-4">Thêm</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
   
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('#category').change(function() {
            let category_id = $(this).val();
            $.ajax({
                url: './get_category_detail.php',
                type: 'POST',
                dataType: 'json',
                data: {category_id}
            })

            .done(function(res) {
                const arrId = Object.keys(res);
                const arrName = Object.values(res);
                   
                $('#category_detail').removeClass('d-none');
                for (let i = 0; i < arrId.length; i++) {
                    $('#category_detail').append(`
                        <option value="${arrId[i]}">${arrName[i]}</option>
                    `);
                }
            })
         
        });
        
        $('#image').change(function(e) {
            $('#product__img').attr('src', URL.createObjectURL(e.target.files[0]));
        });

        $('.btn-menu').click(function() {
            $('.navbar-vertical-mobile').toggle("fast");
            $('.header__navbar-overlay').toggle("fast");
        });
    });
</script>
</body>

</html>