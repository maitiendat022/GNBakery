<?php 
    require_once '../check_super_admin_signin.php';
    $page = 'categories';
    require_once '../navbar-vertical.php';

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

                        <div class="mb-4 fs-4">
                            <label class="form-label" for="image">Ảnh</label>
                            <input type="file" name="image" id="image" accept="image/*" class="form__input form-control"/>
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