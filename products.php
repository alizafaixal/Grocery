<?php
include('header.php');
$leftQuantity = $GetProductQtyByProductId = '';


$sql = "SELECT * FROM category  WHERE status =1 ORDER BY category_name asc";
$res = mysqli_query($conn, $sql);
$category = array();
 while($row = mysqli_fetch_array($res)){
        $category[] = $row;
 }

// print_r($category);
?>
</div>
  
<div class="small-container">

         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                   <?php 
                 foreach ($category as $x){ 
               
                    ?>
                    <li  style="float: left;width: auto; padding-left:10px;" class="menu-item-has-children dropdown">
                    <a href="categories.php?id=<?php echo ($x['category_id']);?>">                     
                        <?php echo ($x['category_name']);?> </a>
            </li> <?php  } 
                  ?>
            
               </ul>
                <div class="clearfix"></div>
            </div>
         </nav>
           
            <form action="search.php" method="get">
                <input type="text" placeholder="Search Products..." id="search_field" name="product_name"  class="search_field">
            </form>
          
            <h2>Latest Products</h2>
            <div class="row">
            <?php
                $sql = "select * from product order by product_id desc limit 4";
              $get_product = mysqli_query($conn, $sql)
              or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
             

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
                <?php } //foreach loop ending?>
        </div>
            <h2>All Products</h2>
         
            <div class="row">
            <?php
           
              $get_product =  get_product($conn, $category_id='', $product_id='', $type='', $limit='');
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
                <?php } //foreach loop ending?>
        </div>
            <div class="page-btn">
                <span> 1 </span>
                <span>2</span>
                <span>3</span>
                <span>4</span>
                <span> &#8594;</span>
            </div>
        </div>
        <?php
include('footer.php');

?>
  