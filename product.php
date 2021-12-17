<?php include "header.php" ;?>
<body>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
				<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">
							<?php
								foreach($getAllProtype as $value){
							?>
								<div class="input-checkbox">
									<label for="categories">
										<a href="product.php?type_id=<?php echo $value ['type_id']?>"><?php echo $value['type_name'] ?></a>
									</label>
								</div>
							<?php }?>
							</div>
						</div>
						<!-- /aside Widget -->
					</div>

					<!-- STORE -->
					<div id="store" class="col-md-9">

						<!-- store products -->
						<div class="row">
							<?php
							if(isset($_GET['type_id'])):
								$type_id = $_GET['type_id'];
								$getProductByType = $product->getProductByType($type_id);
								// hiển thị 3 sản phẩm trên 1 trang
								$perPage = 3; 				
								// Lấy số trang trên thanh địa chỉ
								$page = isset($_GET['page'])?$_GET['page']:1;			
								// Tính tổng số dòng, ví dụ kết quả là 18
								$total = count($getProductByType); 					
								// lấy đường dẫn đến file hiện hành
								$url = $_SERVER['PHP_SELF'].'?type_id='.$type_id ;
								$get3ProductByType =$product->get3ProductByType($type_id,$page,$perPage);
								foreach($get3ProductByType as $value):
							?>
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
									<img src="./img/<?php echo $value['pro_image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id']?>"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price']) ?>VND</del></h4>
										<div class="product-rating">
										</div>
										<div class="product-btns">
										<a href="addwishlist.php?id=<?php echo $value['id']?>" class="add-to-wishlist"><i class="fa fa-heart-o"></i></a>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
											<a href="detail.php?id=<?php echo $value['id']?>"><i class="fa fa-eye"></i></a>
										</div>
									</div>
									<div class="add-to-cart">
									<a href="insertcart.php?id=<?php echo $value['id']?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
									</div>
								</div>
							</div>
							<!-- /product -->
							<?php endforeach; ?>
						<!-- /store products -->
						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<?php 
								echo  $product->paginate($url,$total,$perPage);
								?>
							</ul>
						</div>
						<!-- /store bottom filter -->
						<?php endif;?>
					</div>
					
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
</body>
<?php include "footer.html";?>
		