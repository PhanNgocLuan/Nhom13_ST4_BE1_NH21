<?php
class Wishlist extends Db
{
    public function getAllWishlist($user_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `wishlists`,`products` WHERE pro_id = products.id AND `user_id` = $user_id");
        return parent::select($sql);
    }
    public function  addWishlist($pro_id,$user_id){
        $sql = self::$connection->prepare("INSERT INTO `wishlists`(`pro_id`, `user_id`) VALUES ('$pro_id','$user_id')");
	    return $sql->execute();
    }
    function delWishlist($wishlist_id){
		$sql = self::$connection->prepare("DELETE FROM `wishlists` WHERE `wishlist_id` = $wishlist_id");
		return $sql->execute();
	}
}