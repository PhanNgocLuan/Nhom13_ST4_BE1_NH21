<?php include "header.php";?>

<body>
    <?php include "comment.php";?>

    <!-- Section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Related Products</h3>
                    </div>
                </div>
                <!-- product -->
                <div class="col-md-12">
						<div class="row">
						<div class="products-tabs">
						<div class="products-slick" data-nav="#slick-nav-1">
                         	<?php foreach ($prodarr as $value){
							if(isset($value['type_id'])){
							$getRelatedProducts = $product->getRelatedProducts($value['type_id']);
					 		foreach ($getRelatedProducts as $key) { ?>
                    <!-- product -->
                    	<div class="product">
                        <div class="product-img">
                            <img src="./img/<?php echo $key['pro_image'] ?>" style="width:250px" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a
                                    href="detail.php?id=<?php echo $key['id'] ?>"><?php echo $key['name'] ?></a></h3>
                            <h4 class="product-price"><?php echo number_format($key['price']) ?> VND</h4>
                            <div class="product-btns">
                            <a href="addwishlist.php?id=<?php echo $value['id']?>" class="add-to-wishlist"><i class="fa fa-heart-o"></i></a>
                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add
                                        to compare</span></button>
                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                        view</span></button>
                            </div>
                        </div>
                        <div class="add-to-cart">
						<a href="insertcart.php?id=<?php echo $key['id']?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
                        </div>
                    </div>
                    <?php }}} ?>
                </div>
                <!-- /product -->
				<div id="slick-nav-1" class="products-slick-nav"></div>
				</div>
				</div>
				</div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /Section -->

    <!-- FOOTER -->
    <?php include "footer.html";?>