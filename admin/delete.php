<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
$product = new Product;
$manufacture = new Manufacture();
$protype = new Protype();
//xoa san pham
if(isset($_GET['id'])){
    $product->delProduct($_GET['id']);
    header('location:products.php');
}
//xoa hang
if(isset($_GET['manu_id']))
{
    $manu_id = $_GET['manu_id'];
    $manuarr = $manufacture->countToTalProductOfAManu($manu_id);    
    $total = $manuarr['soLuongSanPham'];    
    if($total > 0)
    {
        echo "This Manufacture has product ! .<a href='javascript: history.go(-1)'>Go Back</a>";
    }
    else {
        $manufacture->delManu($manu_id);
        header('location:manufactures.php');
    }        
}

