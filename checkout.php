
<?php 
	session_start();
	$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : null;
	include "header.php";
?>
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<form action="order.php" method="post">
					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="name" placeholder="Name" required>
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Address" required>
							</div>
							<div class="form-group">
								<input class="input" type="number" name="phonenumber" placeholder="Telephone" required>
							</div>
						</div>
						<!-- /Billing Details -->

						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" name="message" placeholder="Order Notes"></textarea>
						</div>
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<div class="order-products">
								<?php                       
                                	$total=0; 
								    if($cart != null){    
									foreach($cart as $value){   
									$sum = $value['price'] * $value['qty'];                                                     
                            	?>
								<div class="order-col">
									<div><?php echo $value['qty']?>x <?php echo $value['name']?></div>
									<div><?php echo number_format($value['price']) ?> VND</div>
								</div>
								<?php $total += $sum; }} ?>
							</div>
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<?php if($cart != null){ ?>
								<div><strong class="order-total"><?php echo number_format($total,0) . "₫" ?></strong></div>
								<?php }?>
							</div>
						</div>
						<input type="hidden" name="grand_price" value=<?php echo $total?>>
						<input type="submit" name="submit" class="primary-btn order-submit" value="Place order">
					</div>
					<!-- /Order Details -->
					</form>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

<?php include "footer.html";?>