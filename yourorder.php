<?php 
session_start();
include "header.php"; 
?>
<section>
        <section id="order_items">
            <div class="container">
                <h3 style="padding-top:50px;">Your Order</h3>
                <div class="table-responsive order_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="order_menu">
                                <td class="code">Code</td>
                                <td class="order_time">Order time</td>
                                <td class="price">Price</td>
                                <td class="note">Note</td>
                                <td class="status">Status</td>
                                <td class="detail">Detail</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>         
                            <?php 
                            $order = new Order();
                            if(!empty($_SESSION['customer'])){
                                $user_id = ($_SESSION['customer']['user_id']);
                            $getYourOrder = $order->getUserOrder($user_id);
                            foreach($getYourOrder as $value){
                            ?>
                                <tr>
                                    <td class="code">
                                        <?php echo $value['code']?>
                                    </td>
                                    <td class="order_time">
                                        <?php echo $value['created_at']?>
                                    </td>
                                    <td class="price">
                                        <?php echo number_format($value['grand_price'],0) . "₫" ?>
                                    </td>
                                    <td class="note">
                                        <?php echo $value['message']?>
                                    </td>
                                    <td class="status">
                                        <?php echo $value['status']?>
                                    </td>
                                    <td class="detail">
                                        <a href="detailorder.php?order_id=<?php echo $value['order_id']?>"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr> 
                            <?php }}?>                                                                  
                        </tbody>
                    </table>
                </div>
            </div>    
        </section>
        <!--/#cart_items-->
        <!--features_items-->
        </div>
        </div>
    </section>
<?php include "footer.html"; ?>