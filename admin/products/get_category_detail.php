<?php

$category_name = $_POST['category_id'];

require_once '../../database/connect.php';

$sqlCat = "select id from categories where name = '$category_name'";
$resultCat = mysqli_query($connect, $sqlCat);
$row = mysqli_fetch_assoc($resultCat);
$category_id = $row['id'];

$sql = "select id, name from category_detail where category_id = $category_id";
$result = mysqli_query($connect, $sql);
$arr = [];
foreach ($result as $each) {
    $arr[$each['id']] = $each['name'];
}

echo json_encode($arr);
