<?php
include('header.php');

$product_id = $_GET['id'];
$leftQuantity = $GetProductQtyByProductId = '';
 $GetProductQtyByProductId = GetProductQtyByProductId($conn , $product_id);
?>
<div class="small-container">
<h2  class="title m-40">Product Details</h2>
 <div class="row">

         <div class="small-container single-product">
         <div class="row">
         <?php
         if($product_id>0){
            $sql = "SELECT product.*, category.category_id, category.category_name FROM product, category where product_status = 1 AND  product.category_id = category.category_id AND product.product_id= " . $product_id;
            $get_product = mysqli_query($conn, $sql);

         }
       else{
        ?>
        <script>
          window.location.href='products.php';
        </script>
        <?php
     }
        foreach($get_product as $list) {
            $qty =  $list['product_qty']
            ?>
             <div class="col-2">
               
               <a href="product.php?id=<?php echo $list['product_id'];?>"><img src="<?php echo $list['product_img'];?>" width="100%" alt="" id="productImg"></a>
                 <div class="small-img-row">
                     <div class="small-img-col">
                         <img width="100%" src="images/product1.jpg" class="small-img">
                     </div>
                     <div class="small-img-col">
                         <img width="100%" src="images/product6.jpg" class="small-img">
                     </div>
                     <div class="small-img-col">
                         <img width="100%" src="images/product7.jpg" class="small-img">
                     </div>
                     <div class="small-img-col">
                         <img width="100%" src="images/product9.jpg" class="small-img">
                     </div>
                   

                 </div>
             </div>
             <div class="col-2">
                 <p> <a href="index.php">Home</a> >
                   <a href="categories.php?id=<?php echo $list['category_id'];?>"><?php echo $list['category_name'];?></a> > 
                   <a href="product.php?id=<?php echo $list['product_id'];?>"><?php echo $list['product_name'];?></a>
                   </p>
                 <h1><?php echo $list['product_name'];?></h1>
                 <div class="rating">
                     <i style="margin-left: 0px;" class="fa fa-star"></i>
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
                    <select style="margin-left: 0px;" id="qty">
                    <?php for($i = 1; $i <= $leftQuantity; $i++){?>
                    <option ><?php  echo $i ?></option>
                    <?php } ?>
                    </select>
                    </p>
                    <?php  }?>
                 
                 <?php if($leftQuantity >0 ){ ?>
                 <a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['product_id'];?>' ,'add')" class="btn">Add to cart→</a>
                 <?php  }?>
                 <h3 style="margin-top: 20px;">Small Description <i class="fa fa-indent"></i></h3>

                 <p><?php echo $list['product_short_desc'];?></p>
                 <p><?php echo $list['product_desc'];?></p>

             </div>
         </div>
         <p><a  class="btn backbtn" href="products.php">Go back</a></p>
     </div> 
             <?php } //foreach loop ending?>
     </div>
     </div>
    <?php
include('footer.php');
?>
   