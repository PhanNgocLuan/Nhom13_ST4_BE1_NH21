<?php
include "header.php"; 
?>
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop01.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Laptop<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop03.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Accessories<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop02.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Cameras<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<?php foreach($getAllProtype as $value){ ?>
									<li><a data-toggle="tab" href="#tab<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></a></li>
									<?php }?>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab active -->
								<div id="tab0" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php foreach($getNew10Products as $value){ ?>
										<!-- product -->
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
										<?php } ?>
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab active -->

								<!-- tab 1 -->
								<div id="tab1" class="tab-pane fade in">
									<div class="products-slick" data-nav="#slick-nav-2">
										<?php 
										$getNew10ProductsTypeId1 = $product->getNew10ProductsTypeId1();
										foreach($getNew10ProductsTypeId1 as $value){ ?>
										<!-- product -->
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
										<?php } ?>
									</div>
								</div>
								<!-- /tab 1 -->

								<!-- tab 2 -->
								<div id="tab2" class="tab-pane fade in">
									<div class="products-slick" data-nav="#slick-nav-3">
										<?php 
										$getNew10ProductsTypeId2 = $product->getNew10ProductsTypeId2();
										foreach($getNew10ProductsTypeId2 as $value){ ?>
										<!-- product -->
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
										<?php } ?>
									</div>
								</div>
								<!-- /tab 2 -->

								<!-- tab 3 -->
								<div id="tab3" class="tab-pane fade in">
									<div class="products-slick" data-nav="#slick-nav-3">
										<?php 
										$getNew10ProductsTypeId3 = $product->getNew10ProductsTypeId3();
										foreach($getNew10ProductsTypeId3 as $value){ ?>
										<!-- product -->
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
										<?php } ?>
									</div>
								</div>
								<!-- /tab 3 -->

								<!-- tab 4 -->
								<div id="tab4" class="tab-pane fade in">
									<div class="products-slick" data-nav="#slick-nav-4">
										<?php 
										$getNew10ProductsTypeId4 = $product->getNew10ProductsTypeId4();
										foreach($getNew10ProductsTypeId4 as $value){ ?>
										<!-- product -->
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
										<?php } ?>
									</div>
								</div>
								<!-- /tab 4 -->

								<!-- tab 5 -->
								<div id="tab5" class="tab-pane fade in">
									<div class="products-slick" data-nav="#slick-nav-5">
										<?php 
										$getNew10ProductsTypeId5 = $product->getNew10ProductsTypeId5();
										foreach($getNew10ProductsTypeId5 as $value){ ?>
										<!-- product -->
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
										<?php } ?>
									</div>
								</div>
								<!-- /tab 5 -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="#">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- NEWSLETTER -->
<?php include "footer.html"; ?>
