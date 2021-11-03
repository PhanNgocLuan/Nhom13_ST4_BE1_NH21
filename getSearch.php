<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/Comments.php";

$input = json_decode(file_get_contents('php://input'), true);
$keyword = $input['keyword'];

$product = new Product();

if($keyword != ''){
    $item = $product->searchProducts($keyword);
}
else{
    $item = [];
}



echo json_encode($item);



