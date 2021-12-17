<?php
require "config.php";
require "models/db.php";
require "models/orders.php";
require "models/orderdetail.php";
$orderdetail = new Orderdetail();
$order = new Order();
if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $order->delOrderByOrderID($order_id);
    $orderdetail->delOrderDetailByOrderID($order_id);
    echo "Cancel Order succesfully!! .<a href='javascript: history.go(-2)'>Go Back</a>";
}

