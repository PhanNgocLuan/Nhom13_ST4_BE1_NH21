<?php include "header.php"; 
if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
$orderdetail = new Orderdetail();
$order = new Order();
?>
<div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <h2>Your Order</h2>
                <div class="card-body border bg-white rounded">
                    <?php
                    $getOrderByOrderID = $order->getOrderByOrderID($order_id);
                    $cus_name = $getOrderByOrderID['cus_name'];
                    $cus_address = $getOrderByOrderID['cus_address'];
                    $message = $getOrderByOrderID['message'];
                    $created_at = $getOrderByOrderID['created_at'];
                    $grand_price = $getOrderByOrderID['grand_price'];
                    $status = $getOrderByOrderID['status'];
                    ?>
                    <div class="row mb-1">
                        <h4 class="col-md-3">Full name</h4>
                        <div class="col-md-9"><h4><?php echo $cus_name?></h4></div>
                    </div>
                    <div class="row mb-1">
                        <h4 class="col-md-3">Address</h4>
                        <div class="col-md-9"><h4><?php echo $cus_address?></h4></div>
                    </div>
                    <div class="row mb-1">
                        <h4 class="col-md-3">Note</h4>
                        <div class="col-md-9"><h4><?php echo $message?></h4></div>
                    </div>
                    <div class="row mb-1">
                        <h4 class="col-md-3">Order date</h4>
                        <div class="col-md-9"><h4><?php echo $created_at?></h4></div>
                    </div>
                    <div class="row mb-1">
                        <h4 class="col-md-3">Grand Price</h4>
                        <div class="col-md-9"><h4><?php echo $grand_price?></h4></div>
                    </div>
                    <div class="row mb-1">
                        <h4 class="col-md-3">Status</h4>
                        <div class="col-md-1">
                            <!--Kiểm tra trạng thái đơn hàng  -->
                            <div class="btn btn-warning" style="bottom: auto"><?php echo $status?></div>
                        </div>
                    </div>
                    <!-- Đổi dữ liệu chi tiết đơn hàng -->
                    <div class="row" style="margin-top:20px;">
                        <h4 class="col-md-3">List Product</h4>
                        <div style="max-height: 300px;overflow-y: scroll;">
                            <table class="table table-hover table-sm table-responsive col-md-9" style="background-color: white;">
                                <tbody>
                                    <?php
                                        $getOrderDetail = $orderdetail->getOrderDetail($order_id);
                                        foreach($getOrderDetail as $value){
                                    ?>
                                    <tr>
                                        <td style="text-align: center;">
                                            <img src="img/<?php echo $value['image']?>" style="width: 70px">
                                        </td>
                                        <td>
                                            <?php echo $value['name']?>
                                            <p><?php echo number_format($value['price'],0)?> x <?php echo $value['quantity']?></p>
                                        </td>
                                        <td>Price
                                            <p>
                                                <b><?php echo number_format($value['total'],0) ."₫"?></b>
                                            </p>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php if($status == "progress"){ ?>
                    <div class="col-md-12" style="text-align:center;margin-top: 60px;">
                        <a href="cancelorder.php?order_id=<?php echo $order_id?>" class="btn btn-sm btn-danger" style="padding:10px 10px;font-size:16px;">Cancel Order</a>
                    </div>
                    <?php } ?>
                </div>
            </div>     
        </div>
    </div>
<?php include "footer.html"; }?>