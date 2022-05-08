<?php
include('header.php');

$category_id = $_GET['id'];
$leftQuantity = $GetProductQtyByProductId = '';
?>
<div class="small-container">
<h2 class="title m-40">Products in Category</h2>
 <div class="row">
 <?php
           if($category_id>0){
            $sql = "SELECT * FROM product where product_status = 1 and category_id = " . $category_id;
            $get_product = mysqli_query($conn, $sql);
           }else{
              ?>
              <script>
                window.location.href='products.php';
              </script>
              <?php
           }
         

         foreach($get_product as $list) {
          $qty =  $list['product_qty'];
          $GetProductQtyByProductId = GetProductQtyByProductId($conn , $list['product_id']);
            ?>  
         <div class="col-4 prdct">
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
             <?php } //foreach loop ending?>
             <p><a class="btn " href="products.php">Go back</a></p>
     </div>
       
        
     </div>
    <?php
include('footer.php');
?>
   