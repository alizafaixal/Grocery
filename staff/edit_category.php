<?php
include('header.inc.php');
$msg= '';
$category_name ='';
$id = clean($conn, $_GET['id']);
$select = "SELECT * FROM `category` WHERE `category_id` = '$id'";
$res =  mysqli_query($conn, $select)
or trigger_error("Query Failed! SQL: $select - Error: ".mysqli_error($conn), E_USER_ERROR);
if(mysqli_num_rows($res)>0){
    $row = mysqli_fetch_array($res);
    $category_name = $row['category_name'];
    $old_category_name =  $row['category_name'];
}
if(isset($_POST['submit'])){
    $category_name = clean($conn, $_POST['category_name']);
    //if admin doesnt change the category name so no action required 
    if( $category_name != $old_category_name){
        //if catgory name is different 
            $check = "SELECT * FROM  `category` WHERE `category_name` = '$category_name'";
            $res =  mysqli_query($conn, $check)
        or trigger_error("Query Failed! SQL: $check - Error: ".mysqli_error($conn), E_USER_ERROR);
        if(mysqli_num_rows($res)>0 ){
            while($row = mysqli_fetch_array($res)){
                $id = $row['category_id'];
            }
            $msg = 'category already exists with a category id of ' . $id;
        }else{
            $update = "UPDATE `category` SET `category_name` = '$category_name', `status` = '1' WHERE `category_id` = '$id'";
            $update_res =  mysqli_query($conn, $update)
            or trigger_error("Query Failed! SQL: $update - Error: ".mysqli_error($conn), E_USER_ERROR);
            if($update_res){
                $msg = 'category updated';
            }
        }   
    }else{
        $msg = 'change the category name before submitting';
    }
   
}
?>

 <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Edit Category</strong><small> Form</small></div>
                        <form  method="post">
                        <div class="card-body card-block">
                           <div class="form-group"><label for="category"  class=" form-control-label">category name</label>
                           <input type="text" name="category_name" required id="category" placeholder="Enter the category name" class="form-control"  value="<?php echo $category_name ;?>" ></div>
                          
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