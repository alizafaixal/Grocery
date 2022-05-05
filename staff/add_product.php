<?php
include('header.inc.php');
$msg ='';
$category_id='';
$product_name='';
$product_mrp='';
$product_price='';
$product_qty='';
$product_img='';
$product_short_desc='';
$product_desc='';
$product_meta_title='';
$product_meta_desc='';
$product_meta_keywords='';
$product_status='';
if(isset($_POST['submit'])){
   $product_name=clean($conn, $_POST['product_name']);
   $product_mrp=clean($conn, $_POST['product_mrp']);
   $product_price=clean($conn, $_POST['product_price']);
   $product_qty=clean($conn, $_POST['product_qty']);
   $product_img=clean($conn, $_POST['product_status']);
   $product_short_desc=clean($conn, $_POST['product_short_desc']);
   $product_desc=clean($conn, $_POST['product_desc']);
   $product_meta_title=clean($conn, $_POST['product_meta_title']);
   $product_meta_desc=clean($conn, $_POST['product_meta_desc']);
   $product_meta_keywords=clean($conn, $_POST['product_meta_keywords']);
   $product_status= clean($conn, $_POST['product_status']);
   $category_id = clean($conn, $_POST['category_id']);
   $newdir = 'C:/wamp64/www/grocery/images/'. $_FILES['image']['name'];
   $image= 'images/'. $_FILES['image']['name'];
  
    $check = "SELECT * FROM `product` WHERE `product_name` = '$product_name'";
    $ans =  mysqli_query($conn, $check)
    or trigger_error("Query Failed! SQL: $check - Error: ".mysqli_error($conn), E_USER_ERROR);
    if(mysqli_num_rows($ans)>0){
        $msg=  'product already exists, Cannot add  the same product name again, Modify the name';
    }else{
    
        $sql =  "INSERT INTO `product` ( `category_id`, `product_name`, `product_mrp`, `product_price`, `product_qty`, `product_img`, `product_short_desc`, `product_desc`, `product_meta_title`, `product_meta_desc`, `product_meta_keywords`, `product_status`) VALUES ($category_id, '$product_name', '$product_mrp', '$product_price', '$product_qty', '$image', '$product_short_desc', '$product_desc', '$product_meta_title', '$product_meta_desc', '$product_meta_keywords', '$product_status');";
        $res =  mysqli_query($conn, $sql)
        or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
        if ($res){
         ?>
         <script>
         window.location.href= 'products.php';
         </script>
         <?php
      }
        
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
        move_uploaded_file($_FILES['image']['tmp_name'], $newdir);
    }
   
}
?>
 <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add Product</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">>
                        <div class="card-body card-block">
                           <div class="form-group"><label for="Product"  class=" form-control-label">Product name</label>
                           <input type="text" name="product_name" required id="Product" placeholder="Enter the Product name" class="form-control"  value="<?php echo $product_name ;?>" ></div>
                           <div class="form-group"><label for="Product"  class=" form-control-label">Category name</label>
                           <select name="category_id">
                             
                           <?php
                          $res=  mysqli_query($conn, "SELECT * FROM `category` ORDER BY `category`.`category_name` ASC");
                           while($row = mysqli_fetch_array($res)){
                              echo "<option value= " . $row['category_id'] . ">".  $row['category_name'] ."</option>";
                           }
                           ?>
                           </select> </div>
                           <div class="form-group"><label for="mrp"  class=" form-control-label">Product mrp</label>
                           <input type="text" name="product_mrp" required id="mrp" placeholder="Enter the Product mrp" class="form-control"  value="<?php echo $product_mrp ;?>" ></div>
                           <div class="form-group"><label for="price"  class=" form-control-label">Product price</label>
                           <input type="text" name="product_price" required id="price" placeholder="Enter the Product price" class="form-control"  value="<?php echo $product_price ;?>" ></div>
                           <div class="form-group"><label for="qty"  class=" form-control-label">Product qty</label>
                           <input type="number" name="product_qty" required id="qty" placeholder="Enter the Product qty" class="form-control"  value="<?php echo $product_qty ;?>" ></div>
                           <div class="form-group"><label for="short_desc"  class=" form-control-label">product short description</label>
                           <textarea type="text" name="product_short_desc"  id="short_desc"  class="form-control" ><?php echo $product_short_desc ;?></textarea></div>
                           <div class="form-group"><label for="img"  class=" form-control-label">product img</label>
                            <input type="file" name="image" required id="img" placeholder="Enter the Product img" class="form-control"  ></div>
                        
                           <div class="form-group"><label for="desc"  class=" form-control-label">product desc</label>
                           <textarea type="text" name="product_desc" id="desc" class="form-control" ><?php echo $product_desc ;?></textarea></div>
                           <div class="form-group"><label for="meta_title"  class=" form-control-label">product meta title</label>
                           <textarea name="product_meta_title"  id="meta_title" class="form-control"><?php echo $product_meta_title ;?></textarea></div> 
                           <div class="form-group"><label for="meta_desc"  class=" form-control-label">product meta desc</label>
                           <textarea type="text" name="product_meta_desc" id="meta_desc" class="form-control"  ><?php echo $product_meta_desc ;?> </textarea></div>
                           <div class="form-group"><label for="meta_keywords"  class=" form-control-label">product meta keyword</label>
                           <textarea type="text" name="product_meta_keywords"  id="meta_keywords"  class="form-control"> <?php echo $product_meta_keywords ;?> </textarea></div>
                           <div class="form-group"><label for="status"  class=" form-control-label">product status</label>
                           <input type="text" name="product_status" required id="status" placeholder="Enter the Product status" class="form-control"  value="<?php echo $product_status ;?>" ></div>
                           <button name="submit" type="submit" id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount">Submit</span>
                           </button>
                           
                        </div>
                        <div class="field_error"><?php echo $msg;?></div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="clearfix"></div>

         <?php
include('footer.inc.php');
?>