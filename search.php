<?php

$search = $_GET['term'];

require_once './database/connect.php';

$sql = "select products.name,products.id,products.image,products_size.price 
from products,products_size where name like '%$search%' and products_size.size = 18";
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