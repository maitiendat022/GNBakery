<?php
require_once '../check_admin_signin.php';

if(empty($_POST['name']) || empty($_POST['price']) || empty($_POST['size']) || empty($_POST['category']) ||  empty($_POST['image_old'])) {
    $_SESSION['error'] = 'Phải điền đầy đủ thông tin';
    header("location:form_update.php?id=$id");
    exit();
}
$id = $_POST['id'];

$sizes = $_POST['size'];
$prices = $_POST['price'];

$image_old = $_POST['image_old'];
$image_new = $_FILES['image_new'];

$name = $_POST['name'];
$description = $_POST['description'];
$category = $_POST['category'];
$admin_id = $_SESSION['id'];

foreach($sizes as $size){
        if ($size == "") {
            $_SESSION['error'] = 'Phải điền đầy đủ thông tin'; 
                header("location:form_update.php?id=$id");
                exit();
        }
}
foreach($prices as $price){
        if ($price == "") {
            $_SESSION['error'] = 'Phải điền đầy đủ thông tin'; 
                header("location:form_update.php?id=$id");
                exit();
        }
      }
foreach($sizes as $size){
    if ($size < 0) {
        $_SESSION['error'] = 'Kích thước phải lớn hơn 0!'; 
            header("location:form_update.php?id=$id");
            exit();
    }
  }
foreach($prices as $price){
    if ($price < 0) {
        $_SESSION['error'] = 'Giá phải lớn hơn 0!'; 
            header("location:form_update.php?id=$id");
            exit();
    }
  }

// Ảnh
if($image_new['size'] > 0) {
    $folder = '../../assets/images/products/';
    $path = $image_new['name'];
    $file_extension = pathinfo($path, PATHINFO_EXTENSION);
    $file_name = 'cake_' . time() . '.' . $file_extension; 
    $path_file = $folder . $file_name;

    move_uploaded_file($image_new['tmp_name'], $path_file);
}
else {
    $file_name = $image_old;
}
// echo $id;
// echo var_dump($sizes);
// echo 'br';
// echo var_dump($prices);
require_once '../../database/connect.php';

$sql = "update products set name = '$name', image = '$file_name' ,description = '$description', category_detail_id = $category 
where id = $id";
$result = mysqli_query($connect, $sql);

$sqldelete = "delete from products_size where product_id = $id";
$resultdelete = mysqli_query($connect, $sqldelete);

foreach ($sizes as $key => $size) {
    $price = $prices[$key];
    $sql = "INSERT INTO products_size (product_id,size, price) VALUES ('$id', '$size', '$price')";
    if ($connect->query($sql) != TRUE) {   
        break;
    }
}
mysqli_close($connect);
$_SESSION['success'] = 'Đã sửa thành công';
header("location:form_update.php?id=$id");

?>
