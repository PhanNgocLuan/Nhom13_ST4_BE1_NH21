<?php
require "config.php";
require "models/db.php";
require "models/wishlist.php";
$wishlist = new Wishlist();
if(isset($_GET['wishlist_id'])){
    $wishlist_id = $_GET['wishlist_id'];
    $wishlist->delWishlist($wishlist_id);
    header("location:wishlists.php");
}