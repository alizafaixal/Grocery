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
$id = clean($conn, $_GET['id']);
$select = "SELECT * FROM `product` WHERE `product_id` = '$id'";
$res =  mysqli_query($conn, $select)
or trigger_error("Query Failed! SQL: $select - Error: ".mysqli_error($conn), E_USER_ERROR);
if(mysqli_num_rows($res)>0){
    $row = mysqli_fetch_array($res);
    $product_name= $row ['product_name'];
    $product_mrp= $row ['product_mrp'];
    $product_price= $row ['product_price'];
    $product_qty= $row ['product_qty'];
    $product_img= $row ['product_status'];
    $product_short_desc= $row ['product_short_desc'];
    $product_desc= $row ['product_desc'];
    $product_meta_title= $row ['product_status'];
    $product_meta_desc= $row ['product_meta_desc'];
    $product_meta_keywords= $row ['product_meta_keywords'];
    $product_status=  $row ['product_status'];
    $category_id = $row ['category_id'];
    $old_product_name =  $row['product_name'];

}
if(isset($_POST['submit'])){
    $product_name = clean($conn, $_POST['product_name']);
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
    
            $update = "UPDATE `product` SET `category_id` = '$category_id', `product_name` = '$product_name', `product_mrp` = '$product_mrp', `product_price` = '$product_price', `product_qty` = '$product_qty', `product_short_desc` = '$product_short_desc', `product_desc` = '$product_desc', `product_meta_title` = '$product_meta_title', `product_meta_desc` = '$product_meta_desc', `product_meta_keywords` = '$product_meta_keywords', `product_status` = '$product_status' WHERE `product`.`product_id` = $id";
            $update_res =  mysqli_query($conn, $update)
            or trigger_error("Query Failed! SQL: $update - Error: ".mysqli_error($conn), E_USER_ERROR);
            if($update_res){
                $msg = 'product updated';
            }
        }   

?>

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Edit Product</strong><small> Form</small></div>
                        <form  method="post">
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