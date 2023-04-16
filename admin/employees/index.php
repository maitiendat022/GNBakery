<?php 
    require_once '../check_admin_signin.php';
    $page = 'users';
    $admin_id = $_SESSION['id'];
    require_once '../../database/connect.php';

    $where = '1';
    $page_current = 1;
    if(isset($_GET['page'])) {
        $page_current = $_GET['page'];
    }
    $search = '';
    if(isset($_GET['search'])) {
        $search = htmlspecialchars($_GET['search'], ENT_QUOTES);
        $where = " users.name like '%$search%' or users.id like '%$search%' or users.email like '%$search%' or users.phone like '%$search%' or users.address like '%$search%'";
    }

    $sql_num_order = "select count(*) from orders";
    $arr_num_order = mysqli_query($connect, $sql_num_order);
    $result_num_order = mysqli_fetch_array($arr_num_order);
    $num_order = $result_num_order['count(*)'];

    $num_order_per_page = 10;

    $num_page = ceil($num_order / $num_order_per_page);
    $skip_page = $num_order_per_page * ($page_current - 1);
    $sql = "Select *,DATE_FORMAT(created, '%Y/%m/%d') as date from users where level = 2 and ($where)
    ORDER BY status asc,id DESC
    limit $num_order_per_page offset $skip_page";
    $result = mysqli_query($connect, $sql);

    require_once '../navbar-vertical.php';
?>

    <div class="main__container">
        <div class="main-container-text d-flex align-items-center">
            <a class="header__name text-decoration-none" href="#">
                <?= $page == 'root'?'Trang chủ':'' ?>
                <?= $page == 'users'?'Nhân viên':'' ?>
                <?= $page == 'categories'?'Thể loại':'' ?>
                <?= $page == 'products'?'Sản phẩm':'' ?>
                <?= $page == 'orders'?'Đơn hàng':'' ?>
            </a>
        </div>
        <div class="container-fluid px-4">
            
            <a href="form_insert.php" class="btn-insert btn btn-light btn-lg">Thêm</a>   
            <div class="container-fluid">
            <div class="row gx-5">
                <div class="col-12">
                <?php include '../error_success.php' ?>
                    <div class="table-responsive-sm">
                        <table class="order_table table table-sm table-light align-middle">
                            <thead style = "text-align : center;">
                                <tr>
                                    <th scope="col">Mã nhân viên</th>
                                    <th scope="col">Tên nhân viên</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th  scope="col">Địa chỉ</th>
                                    <th  scope="col">Giới tính</th>
                                    <th   scope="col">Ngày sinh</th>
                                    <th  scope="col">Ngày tạo</th>
                                    <th  scope="col">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody style ="text-align:center;">
                            <?php foreach($result as $each){ ?>
                                <tr>
                                    <th class ="id-numbers" scope="col">
                                        <a href="../employees/form_update.php?id=<?=$each['id']?>"style = "text-decoration:none; color:#333;"href="" >NVGN<?= $each['id'] ?></a>
                                    </th>
                                    <th scope="col">
                                        <span class = "nameofyou"><?= $each['name'] ?></span>
                                    </th>
                                    <th scope="col">
                                       <span class="nameofyou"><?= $each['email'] ?></span>
                                       
                                    </th>
                                    <th scope="col">
                                       <span class="nameofyou"><?= $each['phone'] ?></span> 
                                    </th>
                                    <th scope="col">
                                       <span class="nameofyou"><?= $each['address'] ?></span> 
                                    </th>
                                   
                                    <th scope="col"><?= $each['gender'] ?></th>
                                    <th scope="col" ><?=$each['birthday'] ?></th>
                                    <th scope="col" ><?= $each['date']?>
                                    <th scope="col">
                                        
                                        <div class="two_buttons">
                                            <?php if( $each['status'] == 1) { ?>
                                            <a href="./form_update.php?id=<?= $each['id'] ?>" style = "width:60px;"class = "btnBrowser">Sửa</a>
                                            <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="./update_status.php?id=<?= $each['id'] ?>&status=1&admin_id=<?=$admin_id ?>&page=<?=$page_current?>" style = "width:60px;">Xóa</a>
                                         
                                        </div>
                                        <?php }if($each['status'] == 0){
                                            ?><a onclick="return confirm('Bạn chắc chắn muốn khôi phục lại tài khoản?')" href="./update_status.php?id=<?= $each['id'] ?>&status=0&admin_id=<?=$admin_id ?>&page=<?=$page_current?>">Khôi phục</a>
                                        <?php } ?> 
                                    </th>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
    </div>
        </div>
    </div>
        
<?php require_once '../footer.php'; ?>