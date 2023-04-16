<?php

$search = $_GET['term'];

require_once './database/connect.php';

$sql = "SELECT p.name, p.id, p.image, ps.price, ps.size
FROM products p
INNER JOIN (
  SELECT product_id, MIN(price) AS price
  FROM products_size
  GROUP BY product_id
) min_price ON p.id = min_price.product_id
INNER JOIN products_size ps ON min_price.product_id = ps.product_id AND min_price.price = ps.price
WHERE p.name LIKE '%$search%' ";
$result = mysqli_query($connect,$sql);

$arr = [];
foreach($result as $each) {
    $arr[] = [
        'label' => $each['name'],
        'value' => $each['id'],
        'image' => $each['image'],
        'price' => $each['price']
    ];
}

echo json_encode($arr);