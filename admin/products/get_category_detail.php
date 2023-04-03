<?php

$category_id = $_POST['category_id'];

require_once '../../database/connect.php';

$sql = "select id, name from category_detail where category_id = $category_id";
$result = mysqli_query($connect, $sql);
$arr = [];
foreach ($result as $each) {
    $arr[$each['id']] = $each['name'];
}

echo json_encode($arr);
