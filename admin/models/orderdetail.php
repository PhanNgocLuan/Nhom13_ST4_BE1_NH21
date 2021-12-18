<?php
	/**
	 * 
	 */
	class Orderdetail extends Db
	{
		//lay thong tin hang theo order_id
		function getOrderdetailByOrderId($order_id)
		{
			$sql = self::$connection->prepare("SELECT * FROM orderdetail WHERE order_id = $order_id");
			$sql->execute();
			$items = array();
			$items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
			return $items;
		}
		function getOrderDetail($order_id)
		{
			$sql = self::$connection->prepare("SELECT * FROM orderdetail WHERE order_id = $order_id");
			return parent::select($sql);
		}
	}
?>