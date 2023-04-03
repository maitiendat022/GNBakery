<?php 
    require_once '../../check_super_admin_signin.php';
    $page = 'categories';
    require_once './navbar-vertical.php';

?>
    <div class="main__form">
        <div class="container-fluid px-4">
            <?php include '../error_success.php' ?>
          
            <div class="row gx-5">
                <div class="col-12 text-white">
                    <form action="process_insert.php" method="post" enctype="multipart/form-data">
                        <div class="mb-4 fs-4">
                            <label class="form-label" for="name">Tên</label>
                            <input type="text" name="name" id="name" class="form__input form-control" autocomplete="off"/>
                            <span id="error" class="error_input"></span>
                        </div>

                        <button type="submit" class="form__btn btn btn-dark mb-4">Thêm</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
   
</div>
<script src="../../assets/js/jquery-3.6.0.min.js"></script>
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