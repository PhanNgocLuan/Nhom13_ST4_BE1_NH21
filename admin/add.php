<?php
require "config.php";
require "models/db.php";
require "models/product.php";
$product = new Product;
//Xu ly them
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $manu_id =  $_POST['manu'];
    $type_id =  $_POST['type'];
    $price =  $_POST['price'];
    $image = $_FILES['image']['name'];
    $desc=  $_POST['desc'];
    $feature =  $_POST['feature'];
    $product->addProducts( $name,$manu_id,$type_id,$price,$image,$desc,$feature);
    //upload hinh
        $target_dir = "../img/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
}
header('location:products.php');