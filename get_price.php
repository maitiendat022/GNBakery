
<?php
require_once './database/connect.php';
// Query the database to get the price and size for a specific product and size
$id = $_GET['id'];
$selected_size = $_GET["size"]; // Lấy kích thước được chọn từ yêu cầu AJAX
$sql = "SELECT price, size FROM products_size WHERE product_id = $id AND size = '$selected_size'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    $price = $row["price"];
    $size = $row["size"];
    echo $price . "|" . $size; // Trả về giá và kích thước tương ứng, ngăn cách bằng dấu |
  }
} else {
  echo "";
}

$connect->close();
?>