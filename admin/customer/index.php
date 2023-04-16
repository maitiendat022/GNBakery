<?php 
    require_once '../check_admin_signin.php';
    $page = 'users';

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
    $sql = "Select *,DATE_FORMAT(created, '%Y/%m/%d') as date from users where level = 0 and ($where)
    ORDER BY status asc,id DESC
    limit $num_order_per_page offset $skip_page";
    $result = mysqli_query($connect, $sql);

    require_once '../navbar-vertical.php';
?>

    <div class="main__container">
        <div class="main-container-text d-flex align-items-center">
            <a class="header__name text-decoration-none" href="#">
                <?= $page == 'root'?'Trang chủ':'' ?>
                <?= $page == 'users'?'Khách hàng':'' ?>
                <?= $page == 'categories'?'Thể loại':'' ?>
                <?= $page == 'products'?'Sản phẩm':'' ?>
                <?= $page == 'orders'?'Đơn hàng':'' ?>
            </a>
        </div>
        <div class="container-fluid px-4">
            <div class="container-fluid">
            <div class="row gx-5">
                <div class="col-12">
                    <?php include '../error_success.php' ?>
                    <div class="table-responsive-sm">   
                        <table class="order_table table table-sm table-light align-middle">
                            <thead style = "text-align : center;">
                                <tr>
                                    <th scope="col">Mã khách hàng</th>
                                    <th scope="col">Tên khách hàng</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th  scope="col">Địa chỉ</th>
                                    <th  scope="col">Ngày tạo</th>
                                    <th  scope="col">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody style ="text-align:center;">
                            <?php foreach($result as $each){ ?>
                                <tr>
                                    <th class ="id-numbers" scope="col">
                                        <a style = "text-decoration:none; color:#333;"href="" >KHGN<?= $each['id'] ?></a>
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
                                   
                                    <th scope="col" ><?=$each['date'] ?>
                                    <th scope="col">
                                        <div class="two_buttons">
                                            <?php if($each['status'] == 1) { ?>
                                            <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="./update_status.php?id=<?= $each['id'] ?>&status=1&level=<?=$level?>&page=<?=$page_current?>">Xóa</a>
                                            <?php }if($each['status'] == 0) { 
                                                    $idLevel = $each['id_deleted'];
                                                    $sqlLevel = "select level from users where id = $idLevel";
                                                    $resultLevel = mysqli_query($connect, $sqlLevel);
                                                    $row = mysqli_fetch_assoc($resultLevel);
                                                    $level = $row["level"];
                                                    if($level == 1){?>
                                                        <span>Quản trị viên đã xóa</span>
                                                    <?php
                                                    }if($level == 2){?>
                                                        <span>NVGN<?=$each['id_deleted']?> đã xóa</span>
                                                    <?php
                                                    }?>
                                        </div>

                                        <div>
                                            <a style = "text-decoration: none;"  onclick="return confirm('Bạn chắc chắn muốn khôi phục?')" href="./update_status.php?id=<?= $each['id'] ?>&status=0&level=<?=$level?>&page=<?=$page_current?>">Khôi phục</a>
                                        <?php } ?>
                                        </div>
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