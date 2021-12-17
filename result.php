<?php include "header.php"; ?>
	<body>
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
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
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">

						<!-- store products -->
						<div class="row">
						<?php if(isset($_GET['key'])){
						$key = $_GET['key'];
						$productList = $product->searchProducts($key);
						// hiển thị 3 sản phẩm trên 1 trang
						$perPage = 3; 				
						// Lấy số trang trên thanh địa chỉ
						$page = isset($_GET['page'])?$_GET['page']:1;			
						// Tính tổng số dòng, ví dụ kết quả là 18
						$total = count($productList); 					
						// lấy đường dẫn đến file hiện hành
						$url = $_SERVER['PHP_SELF'].'?key='.$key ;
						$search3Products =$product->search3Products($key,$page,$perPage);
						foreach ($search3Products as $value) { ?>
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="./img/<?php echo $value['pro_image'] ?>" style="width:250px" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id']?>"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price']) ?> VND</h4>
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
						<?php } ?>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<ul class="store-pagination">
								<?php 
								echo  $product->paginate($url,$total,$perPage);
								?>
							</ul>
						</div>
						<!-- /store bottom filter -->
						<?php } ?>
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

<?php include "footer.html"?>