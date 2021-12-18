<?php 
/**
 * 
 */
class Order extends Db
{	
	function getAllOrder()
	{
		$sql = self::$connection->prepare("SELECT * FROM orders");
		return parent::select($sql);
	}
	function getOrderByOrderID($order_id)
	{
		$sql = "SELECT * FROM orders, users WHERE orders.user_id = users.user_id AND order_id = $order_id";
		$item = mysqli_query(self::$connection,$sql);
		$item1 = mysqli_fetch_assoc($item);
		return $item1;
	}
	public function updateStatus($order_id,$status)
    {
        $sql = self::$connection->prepare("UPDATE `orders` SET `status` = '$status' WHERE `order_id` = '$order_id'");
        return $sql->execute(); //return an object
    }
	function countToTalOrder(){
        $sql = "SELECT COUNT(order_id) AS count_order FROM orders";
        $item = mysqli_query(self::$connection,$sql);
        $items1 = mysqli_fetch_assoc($item);
        return $items1;
    }
}