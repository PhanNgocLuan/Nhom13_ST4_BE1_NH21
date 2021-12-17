<?php
    session_start();
    if(isset($_SESSION['customer']) == null){
		header('location: login/login.php');
	  }
    include("header.php");
?>
<section id="wishlist_items">
            <div class="container">
                <h3 style="padding-top:50px;">Your Wishlish</h3>
                <div class="table-responsive wishlist_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="wishlist_menu">
                                <td style="width: 20%" class="image">Item</td>
                                <td style="width: 30%" class="description">Name</td>
                                <td style="width: 15%" class="price">Price</td>
                                <td style="width: 30%" class="description">Description</td>
                            </tr>
                        </thead>
                        <tbody>         
                            <?php                
                                $wishlist = new Wishlist();   
                                $user_id = $_SESSION['customer']['user_id'];         
                                $getAllWishlist = $wishlist->getAllWishlist($user_id);    
                                foreach($getAllWishlist as $value){                                   
                            ?>
                            <tr>
                                <td>
                                    <a href="detail.php?id=<?php echo $value['id']?>"><img src="img/<?php echo $value['pro_image']?>" alt="" width=110></a>
                                </td>
                                <td class="wishlist_name">
                                    <a href="detail.php?id=<?php echo $value['id']?>"><?php echo $value['name'] ?></a>
                                </td>
                                <td class="wishlist_price">
                                    <p><?php echo number_format($value['price'],0)?></p>
                                </td>
                                <td class="wishlist_description">
                                    <p><?php echo " " . substr($value['description'],0,110). "..."?></p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="delwish.php?wishlist_id=<?php echo $value['wishlist_id']?>"><i
                                        class="fa fa-times"></i></a>
                                </td>
                            </tr>   
                            <?php }?>                                                                 
                        </tbody>
                    </table>
                </div>
            </div>    
        </section>
<?php include "footer.html";?>