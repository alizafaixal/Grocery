<?php
include('header.php');

?>
            <div class="row banner">
                <div class="col-2">
                    <h1>The Grocery Shop</h1>
                    <p>Buy Your favourite groceries online at great price</p>
                    <a href="products.php" class="btn">Explore now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="images/banner.jpg" alt="banner">
                </div>
            </div>
        </div>
    </div>
    <!-- Featured Categories -->
    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="images/category-1.jpg" alt="">
                </div>
                <div class="col-3">
                    <img src="images/category-2.jpg" alt="">
                </div>
                <div class="col-3">
                    <img src="images/category-3.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- products -->

    <div class="small-container">
        <h2 class="title">Featured Products</h2>
        <div class="row">
            <div class="col-4">
                <img src="images/product3.jpg" alt="">
                <h4>Long Melon min. 900g</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>Approximately $3.52 900g ($3.92 per kg)</p>
            </div>
            <div class="col-4">
                <img src="images/product2.jpg" alt="">
                <h4>Kurkure Masala Munch</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>$1.89 each</p>
            </div>
            <div class="col-4">
                <img src="images/product1.jpg" alt="">
                <h4>Mapro Strawberry 700ml</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>$6.00 each</p>
            </div>
            <div class="col-4">
                <img src="images/product4.jpg" alt="">
                <h4>Haldiram's Soan Papdi Yelllo 250g</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>$3.10 each</p>
            </div>

        </div>
        <div class="comp_des">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="images/discussion_forum.jpg" alt="">
                </div>
                <div class="col-2">
                    <p>Look for frequently asked questions in the discussion forum, post a question, see previous topics and post and reply on post many more.</p>
                    <a href="home.php" class="btn">View Discussion Forum</a>
                </div>
            </div>
        </div>
    </div>
        
        <h2 class="title">Latest Products</h2>
        <div class="row">
        <?php
        $sql = 'SELECT * FROM product  where product_status =1 ';
        $res = mysqli_query($conn, $sql)
        or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
        $data = array();
        while($row = mysqli_fetch_assoc($res)){
            $data[] = $row;
        }
         foreach($data as $list){
        ?>  
          <div class="col-4">
                <a href="product.php?id=<?php echo $list['product_id'];?>">  <img src="<?php echo $list['product_img'];?>" alt=""></a>
                    <h4><?php echo $list['product_name'];?></h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
               
                    <p><?php echo '$' . $list['product_price'];?></p>
                </div>
         <?php } ?>
       

            </div>

        </div>
    </div>
    <!-- some company information -->
    <div class="comp_des">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="images/img.JPG" alt="">
                </div>
                <div class="col-2">
                    <p>The grocery shop is the fastest growing chain of stores in NSW, and it is easy to see why. We
                        established Grocey shop with the goal to offer great quality at great prices to shoppers.For the
                        last 14 years, we have seen our loyal customer base grow manifold and earning their trust has
                        been
                        one of our biggest achievements.</p>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="testimonal">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum delectus, consectetur hic
                        aperiam corrupti sit sequi nemo tenetur omnis labore.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <img src="images/fb1.jpg" alt="">
                    <h3>Sean parker</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum delectus, consectetur hic
                        aperiam corrupti sit sequi nemo tenetur omnis labore.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <img src="images/fb2.jpg" alt="">
                    <h3> Samon parker</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum delectus, consectetur hic
                        aperiam corrupti sit sequi nemo tenetur omnis labore.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <img src="images/fb3.jpg" alt="">

                    <h3>Elena Gilbert</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="brands">
        <div class="small-container">
            <div class="row">
                <div class="col-5">
                    <img src="images/logo-coca-cola.png" alt="">
                </div>
                <div class="col-5">
                    <img src="images/logo-godrej.png" alt="">
                </div>
                <div class="col-5">
                    <img src="images/logo-oppo.png" alt="">
                </div>
                <div class="col-5">
                    <img src="images/logo-paypal.png" alt="">
                </div>
                <div class="col-5">
                    <img src="images/logo-philips.png" alt="">
                </div>
            </div>
        </div>


    </div>
    <?php
include('footer.php');
?>
   