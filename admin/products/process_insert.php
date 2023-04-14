<?php
require_once '../check_admin_signin.php';

if(empty($_POST['name']) || empty($_POST['price']) || empty($_POST['size']) || empty($_POST['category']) || $_FILES['image']['size'] == 0) {
    $_SESSION['error'] = 'Phải điền đầy đủ thông tin';
    header('location:form_insert.php');
    exit();
}


$sizes = $_POST['size'];
$prices = $_POST['price'];

$name_input = $_POST['name'];
$name = strtoupper($name_input);
$image = $_FILES['image'];
$description = $_POST['description'];
$category = $_POST['category'];
$admin_id = $_SESSION['id'];

foreach($sizes as $size){
        if ($size == "") {
            $_SESSION['error'] = 'Phải điền đầy đủ thông tin'; 
                header('location:form_insert.php');
                exit();
        }
}
foreach($prices as $price){
        if ($price == "") {
            $_SESSION['error'] = 'Phải điền đầy đủ thông tin'; 
                header('location:form_insert.php');
                exit();
        }
      }
foreach($sizes as $size){
    if ($size < 0) {
        $_SESSION['error'] = 'Kích thước phải lớn hơn 0!'; 
            header('location:form_insert.php');
            exit();
    }
  }
foreach($prices as $price){
    if ($price < 0) {
        $_SESSION['error'] = 'Giá phải lớn hơn 0!'; 
            header('location:form_insert.php');
            exit();
    }
  }

// Ảnh
$folder = '../../assets/images/products/';
$path = $image['name'];
$file_extension = pathinfo($path, PATHINFO_EXTENSION);
$file_type = array("jpg", "jpeg", "png");

if ($image["size"] > 1000000) {
    $_SESSION['error'] = 'File của bạn quá lớn!'; 
    header('location:form_insert.php');
    exit();
}

if(!in_array("$file_extension", $file_type)) {
    $_SESSION['error'] = 'Chỉ cho phép file dạng .JPG, .PNG, .JPEG'; 
    header('location:form_insert.php');
    exit();
}

$file_name = 'cake_' . time() . '.' . $file_extension;
$path_file = $folder . $file_name;
move_uploaded_file($image['tmp_name'], $path_file);

require_once '../../database/connect.php';

$sql = "insert into products(name, image , description, category_detail_id, user_id)
values('$name', '$file_name', '$description', $category, $admin_id)";
$result = mysqli_query($connect, $sql);
$product_id = mysqli_insert_id($connect);

foreach ($sizes as $key => $size) {
    $price = $prices[$key];
    $sql = "INSERT INTO products_size (product_id,size, price) VALUES ('$product_id', '$size', '$price')";
    if ($connect->query($sql) != TRUE) {
        break;
    }
    
}

mysqli_close($connect);
$_SESSION['success'] = 'Đã thêm thành công';
header('location:form_insert.php');


?>
