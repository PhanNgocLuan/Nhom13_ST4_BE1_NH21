<?php
require "config.php";
require "models/db.php";
require "models/product.php";
$product = new Product;
<<<<<<< Updated upstream
if (isset($_POST['submit'])) {
    if (isset($_FILES['fileUpload'])) {
        $name = $_POST['name'];
        $manu_id = $_POST['manu'];
        $type_id = $_POST['type'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $fileUpload = $_FILES['fileUpload'];
        $feature = $_POST['feature'];
        //name of image
        $image = $fileUpload['name'];
        $target_file = '../img/' . $image;
        $uploadOk = 1;
        //check exist image
        if (file_exists($target_file)) {
            echo "Image already exists .<a href='javascript: history.go(-1)'>Go Back</a>";
            $uploadOk = 0;
            die();
        } else {
            $uploadOk = 1;
        }
        //kiem tra dung dinh dang anh
        if ($fileUpload['type'] == 'image/jpeg' || $fileUpload['type'] == 'image/jpg' || $fileUpload['type'] == 'image/png') {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            echo "only JPG, JPEG, PNG & GIF files are allowed .<a href='javascript: history.go(-1)'>Go Back</a>";
            die();
        }
        //check file size
        if ($fileUpload['size'] <= 500000) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            echo "This image is too large .<a href='javascript: history.go(-1)'>Go Back</a>";
            die();
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded. .<a href='javascript: history.go(-1)'>Go Back</a>";
            die();
        } else {
            move_uploaded_file($fileUpload['tmp_name'], $target_file);
            $product->addProduct($name, $manu_id, $type_id, $price, $image, $desc, $feature);
        }
    }
}
header('location:products.php');
=======
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $manu_id = $_POST['manu'];
    $type_id = $_POST['type'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $feature = $_POST['feature'];
    $product->addProduct($name,$manu_id,$type_id,$price,$image,$desc,$feature);
    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
}
header('location:products.php');
>>>>>>> Stashed changes
