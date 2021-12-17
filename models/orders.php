<?php 
/**
 * 
 */
class Order extends Db
{		
	//them du lieu cho bang order
	function insertOrder($code,$created_at,$grand_price,$user_id,$name,$email,$phonenumber,$address,$message,$status)
	{
		$sql = self::$connection->prepare("INSERT INTO `orders`(`code`,`created_at`,`grand_price`,`user_id`,`cus_name`,`cus_email`,`cus_phone`,`cus_address`,`message`,`status`) VALUES('$code','$created_at','$grand_price','$user_id','$name','$email','$phonenumber','$address','$message','$status')");
        $sql->execute();
	}

	function getNewestOrder()
	{
		$sql = "SELECT * FROM orders ORDER BY order_id DESC LIMIT 1";
		$item = mysqli_query(self::$connection,$sql);
		$item1 = mysqli_fetch_assoc($item);
		return $item1;
	}
	function getUserOrder($user_id)
	{
		$sql = self::$connection->prepare("SELECT * FROM orders WHERE user_id = $user_id");
		return parent::select($sql);
	}
	function getOrderByOrderID($order_id)
	{
		$sql = "SELECT * FROM orders WHERE order_id = $order_id";
		$item = mysqli_query(self::$connection,$sql);
		$item1 = mysqli_fetch_assoc($item);
		return $item1;
	}
	function delOrderByOrderID($order_id){
		$sql = self::$connection->prepare("DELETE FROM `orders` WHERE `order_id` = $order_id");
		return $sql->execute();
	}
}