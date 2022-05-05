<?php
include('header.php');

$product_name = clean($conn, $_GET['product_name']);
$leftQuantity = $GetProductQtyByProductId = '';
 
?>
<h2>Searched Products</h2>
            <div class="row">
            <?php
                $sql = "SELECT * FROM `product`where product_name LIKE '%$product_name%' OR product_desc LIKE  '%$product_name%'";
              $get_product = mysqli_query($conn, $sql)
              or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
             if( mysqli_num_rows($get_product)>0){
                   //  prx($get_product);
            foreach($get_product as $list) {
                $qty =  $list['product_qty'];
                $GetProductQtyByProductId = GetProductQtyByProductId($conn , $list['product_id']);
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
                    <?php
                    $leftQuantity = $qty - $GetProductQtyByProductId;
                    if($leftQuantity == 0){
                       echo 'Out of stock';
                    }else{
                        echo 'In stock';
                    }
                
                 
                  ?>
                  
                    <p>Quantity Left: <?php echo $leftQuantity  ?> Sold: <?php if($GetProductQtyByProductId == 0) {echo 0;} else{ echo $GetProductQtyByProductId;}?></p>
                    <?php if($leftQuantity >0 ){ ?>
                    <p><span>Select Quantity</span>
                    <select id="qty">
                    <?php for($i = 1; $i <= $leftQuantity; $i++){?>
                    <option ><?php  echo $i ?></option>
                    <?php } ?>
                    </select>
                    </p>
                    <?php  }?>
                 
                 <?php if($leftQuantity >0 ){ ?>
                 <a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['product_id'];?>' ,'add')" class="btn">Add to cart→</a>
                 <?php  }?>
                </div>

                <?php } } 
                else{
                echo 'No such products found'; } //foreach loop ending?>
            </div>
            <p><a class="btn" href="products.php">Go back</a></p>
            <?php
include('footer.php');

?>