<!-- SECTION -->
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
				<form action="insertcard.php" method="get">
					<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $prodarr = $product->getProductById($id);
    $listcomment = $comment->getCommentById($id);
    $allCommentRate = $comment->getCommentRate($id);
    foreach ($prodarr as $value) {
        if ($value['id'] == $id) {
            ?>
					<!-- Product main img -->
					<div class="col-md-6">
						<div id="product-img">
						<img src="./img/<?php echo $value['pro_image'] ?>" alt="" style="width: 400px";>
						</div>
					</div>

					<!-- Product details -->
					<div class="col-md-6">
						<div class="product-details">
							<h2 class="product-name"><?php echo $value['name'] ?></h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link" href="#tab1">Add your review</a>
							</div>
							<div>
								<h3 class="product-price"><?php echo number_format($value['price']) ?> VND</h3>
								<span class="product-available">In Stock</span>
							</div>
							<p><?php echo $value['description'] ?></p>
							<div class="add-to-cart">
								<div class="qty-label">
									Qty
									<div class="input-number">
										<input type="number" min="1" value="1">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
									<input type="hidden" name="id" value="<?php echo $value['id'] ?>" />
								</div>
								<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
							</div>

							<ul class="product-btns">
								<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
							</ul>

							<ul class="product-links">
								<li>Category:</li>
								<li><a href="#"><?php echo $value['type_name'] ?></a></li>
							</ul>

						</div>
					</div>
					<?php }}}?>
					</form>
					<!-- /Product details -->
					<?php
					$total = 0;
					$count = 0;
					foreach ($allCommentRate as $key) {
						$count++;
						$total += $key['comment_rate'];
					}
					if ($count <= 0) {
						$result = 0;
					} else {
						$result = round($total / $count);
					}
					?>
					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Reviews</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->

								<!-- tab3  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-4">
											<div class="rating rating-count">
											<?php if ($result > 0) {?>
                        					<h1 id="star_num" class="count"><?php echo $result ?></h1>
                    						<?php } else {?>
											<h1 class="count">0</h1>
											<?php }?>
											<?php
										if ($result > 0) {
											for ($i = 1; $i <= $result; $i++) {?>
												<i class="fa fa-star" style="color:#FF9900"></i>
												<?php }
												$remain = 5 - $result;
												if ($remain > 0) {
													for ($i = 1; $i <= $remain; $i++) {?>
                        						<i class="fa fa-star" style="color:gray"></i>
                    							<?php }}} else {?>
												<i class="fa fa-star" style="color:gray"></i>
												<i class="fa fa-star" style="color:gray"></i>
												<i class="fa fa-star" style="color:gray"></i>
												<i class="fa fa-star" style="color:gray"></i>
												<i class="fa fa-star" style="color:gray"></i>
                   								<?php }?>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Review Form -->
										<div class="col-md-8">
											<div class="form-comment-group">
												<div id="comment_form">
													<input type="hidden" name="id" id="product_id" value="<?php echo $value['id'] ?>">
													<div class="row">
														<div class="col-md-7">
															<input type="hidden" id="comment_rate" name="comment_rate" required="">
															<input type="text" name="name_comment" id="name_comment" class="form-name" placeholder="Enter Name" autocomplete="off" required="">
														</div>
														<div class="col-md-5">
															<div class="rating">
																<i class="fa fa-star star-rating" id="star_1" data-index="0" value="1"></i>
																<i class="fa fa-star star-rating" id="star_2" data-index="1" value="2"></i>
																<i class="fa fa-star star-rating" id="star_3" data-index="2" value="3"></i>
																<i class="fa fa-star star-rating" id="star_4" data-index="3" value="4"></i>
																<i class="fa fa-star star-rating" id="star_5" data-index="4" value="5"></i>
															</div>
														</div>
													</div>
													<textarea name="comment" id="comment_content" cols="97" rows="7" placeholder="Enter your comment" required=""></textarea><br>
													<button id="submit" class="btn btn-info">Comments</button>
												</div>
											</div>
										</div>
										<!-- /Review Form -->
										<div class="result-comment">
											<p class="title">Comments</p>
											<div class="show-comment" id="show-comment">
												<?php 
												 //var_dump($listcomment);
													foreach($listcomment as $value){ 
												?>
													<div class='show'>
														<div class='show-name'>
															<p>By <b><?= $value['name_comment'] ?></b> on <i><?= $value['created_at']?></i></p>
															<?php for ($i=1; $i <= $value['comment_rate']; $i++) { 
															?>
																<i class="fa fa-star" style="color:#FF9900"></i>
															<?php } ?>
														</div>
														<div class='show-content'>
															<p> <?= $value['comment_content'] ?></p>
														</div> 
													</div>
												<?php } ?>
											</div>
										</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->