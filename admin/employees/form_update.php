<?php 
    require_once '../check_admin_signin.php';

    $admin_id = $_SESSION['id'];
    $page = 'products-insert';
    require_once '../navbar-vertical.php';

    require_once '../../database/connect.php';
    $id = $_GET['id'];
    $sql = "Select * from users where id = $id";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    $pass_hash = $each['password'];
   
?>
    <div class="main__form">
        <div class="main-container-text d-flex align-items-center">
            <a class="header__name text-decoration-none" href="#">
                Thông tin nhân viên
            </a>
        </div>
        <div class=" container-fluid px-4">
            <?php include '../error_success.php' ?>
        
            <div class="row gx-5" style = "padding-right:500px;padding-left:50px;">
                <div class="col-12">

                    <form action="process_update.php" method="post" enctype="multipart/form-data">
                        <div class="mb-4 fs-4">
                            <label class="form-label" for="image">Mã nhân viên</label>
                            <input type="text" readonly name="email" id="email" value= "NVGN<?=$each['id']?>"class="form__input form-control"/>
                        </div>
                        <div class="mb-4 fs-4">
                            <label class="form-label" for="name">Tên</label>
                            <input type="text" name="name" id="name" value= "<?=$each['name']?>" class="form__input form-control" autocomplete="off"/>
                        </div>
                        <div class="mb-4 fs-4">
                            <label class="form-label" for="image">Email</label>
                            <input type="email" readonly name="email" id="email" value= "<?=$each['email']?>"class="form__input form-control"/>
                        </div>
                        
                        <div class="mb-4 fs-4">
                            <label class="form-label" for="image">Số điện thoại</label>
                            <input type="number" name="phone" id="phone" value= "<?=$each['phone']?>"class="form__input form-control"/>
                        </div>
                        <div class="mb-4 fs-4">
                            <label class="form-label" for="image">Địa chỉ</label>
                            <input type="text" name="address" id="address" value= "<?=$each['address']?>" class="form__input form-control"/>
                        </div><div class="mb-4 fs-4">
                            <label class="form-label" for="image">Giới tính: </label><br>
                            <select style = "width:60px;" name="gender" id="gender" class="form__input form-control">
                                <option <?php if($each['gender']=='Nam'){?> selected <?php }?>value="Nam">Nam</option>
                                <option <?php if($each['gender']=='Nữ'){?> selected <?php }?>value="Nữ">Nữ</option>
                            </select>
                        </div>
                        <div class="mb-4 fs-4">
                            <label class="form-label" for="image">Ngày sinh</label>
                            <input type="date" name="birthday" id="birthday"value= "<?=$each['birthday']?>" class="form__input form-control"/>
                        </div><div class="mb-4 fs-4">

                        <input type="hidden" name="admin_id" value="<?= $admin_id ?>">
                        <input type="hidden" name="user_id" value="<?= $id ?>">
                        <button type="submit" class="form__btn btn mb-4">Sửa</button>
                        <a style = "border: 1px solid #FF1493;text-decoration:none;border-radius: 5px;padding:8px;" href="index.php">Trở lại</a>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
   
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>