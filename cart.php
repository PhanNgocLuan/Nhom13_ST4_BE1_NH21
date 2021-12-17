<?php
    session_start();
    if(isset($_SESSION['customer']) == null){
		header('location: login/login.php');
	  }
    include("header.php");
?>
    <section>
        <section id="cart_items">
            <div class="container">
                <h3 style="padding-top:50px;">Your shopping cart</h3>
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Item</td>
                                <td class="description">Name</td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Total</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>         
                            <?php                       
                                $total=0;         
                                if(isset($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $key) {  
                                    $sum = $key['price'] * $key['qty'];                                                        
                            ?>
                                        <tr>
                                            <td class="cart_product">
                                                <a href=""><img src="img/<?php echo $key['pro_image']?>" alt=""
                                                        width=110></a>
                                            </td>
                                            <td class="cart_description">
                                                <h4><a href="detail.php?id=<?php echo $key['id']?>"><?php echo $key['name'] ?></a></h4>
                                            </td>
                                            <td class="cart_price">
                                                <p><?php echo number_format($key['price'],0)?></p>
                                            </td>
                                            <td class="cart_quantity">
                                                <div class="cart_quantity_button">
                                                    <a class="cart_quantity_up" href="insertcart.php?id=<?php echo $key['id'] ?>"> + </a>
                                                    <input type="number" min="1" class="cart_quantity_input" name="quantity" value="<?php echo $key['qty']?>"
                                                        autocomplete="off" size="2">
                                                    <a class="cart_quantity_down" href="insertcart.php?id=<?php echo $key['id']?>&action=tru"> - </a>
                                                </div>
                                            </td>
                                            <td class="cart_total">
                                                <p class="cart_total_price"><?php echo number_format($sum,0) . "₫" ?></p>
                                            </td>
                                            <td class="cart_delete">
                                                <a class="cart_quantity_delete" href="del.php?id=<?php echo $key['id']?>"><i
                                                        class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                            <?php $total += $sum; } } ?>    
                                <tr>
                                    <td class="cart_product">
                                    </td>
                                    <td class="cart_description">
                                    </td>
                                    <td class="cart_price">
                                    </td>
                                    <td class="cart_quantity">
                                    </td>
                                    <td class="cart_total">
                                        <a class="delete-all" href="del.php" style="position: relative;top: 15px;padding:10px 20px; background:#D10024;border-radius:7px;color:#fff;">Delete All</a>
                                        <p class="cart_total_price" style="margin-top:30px;">Total : <?php echo number_format($total) . "₫"?></p>
                                    </td> 
                                </tr>                                                                   
                        </tbody>
                    </table>
                    
                </div>
                <a class="check-out" href="checkout.php" style="position: relative;top: 15px;padding:10px 20px; background:#D10024;border-radius:7px;color:#fff;">Check Out</a>
            </div>    
        </section>
        <!--/#cart_items-->
        <!--features_items-->
        </div>
        </div>
    </section>
<?php include("footer.html"); ?>