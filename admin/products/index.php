<?php 
    require_once '../check_admin_signin.php';
    $page = 'products';

    require_once '../../database/connect.php';

    $where = '1';
    $page_current = 1;
    if(isset($_GET['page'])) {
        $page_current = $_GET['page'];
    }

    $search = '';
    if(isset($_GET['search'])) {
        $search = htmlspecialchars($_GET['search'], ENT_QUOTES);
        $where = "products.name like '%$search%' or products.id like '%$search%'";
    }

    if(isset($_GET['search_status'])) {
        $where = 'products.status like ' . $_GET['search_status'];
    }

    $sql_num_product = "select count(*) from products 
                    where $where";
    $arr_num_product = mysqli_query($connect, $sql_num_product);
    $result_num_product = mysqli_fetch_array($arr_num_product);
    $num_product = $result_num_product['count(*)'];

    $num_product_per_page = 10;

    $num_page = ceil($num_product / $num_product_per_page);
    $skip_page = $num_product_per_page * ($page_current - 1);

    $sql = "select products.*, category_detail.name as category_name, products.user_id, users.id as admin_id, users.level 
    from products
    join category_detail
    on category_detail.id = products.category_detail_id
    join categories
    on categories.id = category_detail.category_id
    join users
    on users.id = products.user_id
    where $where
    ORDER BY status asc,id DESC
    limit $num_product_per_page offset $skip_page
    ";
    
    $result = mysqli_query($connect, $sql);

    require_once '../navbar-vertical.php';
?>

    <div class="main__container">
        <div class="main-container-text d-flex align-items-center">
            <a class="header__name text-decoration-none" href="#">
                <?= $page == 'root'?'Trang chủ':'' ?>
                <?= $page == 'employees'?'Nhân viên':'' ?>
                <?= $page == 'categories'?'Thể loại':'' ?>
                <?= $page == 'products'?'Sản phẩm':'' ?>
                <?= $page == 'orders'?'Đơn hàng':'' ?>
            </a>
        </div>
        <div class="container-fluid px-4">
            <a href="form_insert.php" class="btn-insert btn btn-light btn-lg">Thêm</a>
            <div class="row gx-5">
                <div class="col-12">
                    <div class="table-responsive-sm">
                        <table class="product__table table table-sm table-light table-bordered  align-middle">

                            <?php require_once '../error_success.php' ?>
                            <thead>
                                <tr>
                                <th scope="col">Mã</th>
                                <th scope="col">Tên bánh</th>
                                <th scope="col">Ảnh</th>    
                                <th scope="col">Loại bánh</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Người thêm</th>
                                <th scope="col">Sửa</th>
                                <th scope="col">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $each) { ?>
                                    <tr>
                                        <th scope="row">
                                            <a href="show.php?id=<?= $each['id'] ?>" class="text-decoration-none"> SPGN<?= $each['id'] ?></a>
                                        </th>
                                        <td>
                                            <a href="show.php?id=<?= $each['id'] ?>" class="text-decoration-none"><?= $each['name'] ?></a>
                                        </td>
                                        <td>
                                            <img class="products__img" src="../../assets/images/products/<?= $each['image'] ?>" alt="">
                                        </td>
                                        
                                        <td><?= $each['category_name'] ?></td>
                                        <td><?php 
                                            if($each['status'] === '1') { ?>
                                                Đang bán
                                            <?php } else { ?>
                                                Ngừng bán
                                            <?php } ?>
                                        </td>
                                        <td><?php if($each['level'] == 1){
                                                        echo "Quản trị viên";
                                                    }else{ 
                                                        $admin_id = $each['admin_id'];
                                                        echo "NVGN$admin_id";
                                                    }?></td>
                                        <?php if($each['status'] === '1') { ?>
                                            <td>
                                                <a href="form_update.php?id=<?= $each['id'] ?>">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="delete.php?id=<?= $each['id'] ?>">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>
                                            </td>
                                        <?php } else { ?>
                                            <td colspan="2">    
                                                <a href="update_status.php?id=<?= $each['id'] ?>">
                                                    Mở bán
                                                </a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                                
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
        
<?php require_once '../footer.php'; ?>