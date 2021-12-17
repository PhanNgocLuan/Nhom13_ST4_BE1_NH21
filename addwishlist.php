<?php
session_start();
if(!empty($_SESSION['customer']))
{
    $user_id = $_SESSION['customer']['user_id'];
}
require "config.php";
require "models/db.php";
require "models/wishlist.php";
$wishlist = new Wishlist;
if (isset($_GET['id']) || isset($user_id)) {
    $pro_id = $_GET['id'];
    $wishlist->addWishlist($pro_id,$user_id);
    header('location:wishlists.php');
}