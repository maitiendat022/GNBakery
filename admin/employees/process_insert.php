<?php
require_once '../check_admin_signin.php';
$gender = $_POST['gender'];
echo($gender) ;
// if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['phone']) || empty($_POST['admin_id']) || $_FILES['image']['size'] == 0) {
//     $_SESSION['error'] = 'Phải điền đầy đủ thông tin';
//     header('location:form_insert.php');
//     exit();
// }

// $name = $_POST['name'];
// $size = $_POST['size'];
// $price = $_POST['price'];
// $image = $_FILES['image'];
// $description = $_POST['description'];
// $category = $_POST['category'];
// $admin_id = $_POST['admin_id'];

// if(!is_int($price)) {
//     $_SESSION['error'] = 'Giá phải là số!'; 
//     header('location:form_insert.php');
//     exit();
// }
// else if($price <= 0) {
//     $_SESSION['error'] = 'Giá phải lớn hơn 0!'; 
//     header('location:form_insert.php');
//     exit();
// }

// // Ảnh
// $folder = '../../assets/images/products/';
// $path = $image['name'];
// $file_extension = pathinfo($path, PATHINFO_EXTENSION);
// $file_type = array("jpg", "jpeg", "png");

// if ($image["size"] > 1000000) {
//     $_SESSION['error'] = 'File của bạn quá lớn!'; 
//     header('location:form_insert.php');
//     exit();
// }

// if(!in_array("$file_extension", $file_type)) {
//     $_SESSION['error'] = 'Chỉ cho phép file dạng .JPG, .PNG, .JPEG'; 
//     header('location:form_insert.php');
//     exit();
// }

// $file_name = 'cake_' . time() . '.' . $file_extension;
// $path_file = $folder . $file_name;
// move_uploaded_file($image['tmp_name'], $path_file);

// require_once '../../database/connect.php';

// $sql = "insert into products(name, image, size, price, description, category_detail_id, user_id)
// values(?, ?, ?, ?, ?, ?, ?)";

// $stmt = mysqli_prepare($connect, $sql);
// if($stmt) {
//     mysqli_stmt_bind_param($stmt, 'ssiisii', $name, $file_name, $size, $price, $description, $category, $admin_id);
//     mysqli_stmt_execute($stmt);

//     $_SESSION['success'] = 'Đã thêm thành công';
// }
// else {
//     $_SESSION['error'] = 'Không thể chuẩn bị truy vấn!';
//     header('location:form_insert.php');
//     exit();
// }

// mysqli_stmt_close($stmt);
// mysqli_close($connect);

// header('location:form_insert.php');