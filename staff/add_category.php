<?php
include('header.inc.php');
$msg= '';
$category_name ='';
if(isset($_POST['submit'])){
    $category_name = clean($conn, $_POST['category_name']);
    $check = "SELECT * FROM `category` WHERE `category_name` = '$category_name'";
    $ans =  mysqli_query($conn, $check)
    or trigger_error("Query Failed! SQL: $check - Error: ".mysqli_error($conn), E_USER_ERROR);
    if(mysqli_num_rows($ans)>0){
        $msg=  'category already exists, Cannot add  the same category name again, Modify the name';
    }else{
    
        $sql =  "INSERT INTO `category` (`category_name`, `status`) VALUES ( '$category_name ', '1')";
        $res =  mysqli_query($conn, $sql)
        or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
        if ($res){
            $msg=  'new record inserted';
        }
    }
}
?>
 <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add Category</strong><small> Form</small></div>
                        <form action="add_category.php" method="post">
                        <div class="card-body card-block">
                           <div class="form-group"><label for="category"  class=" form-control-label">category name</label>
                           <input type="text" name="category_name" required id="category" placeholder="Enter the category name" class="form-control"  value="<?php //echo $category_name ;?>" ></div>
                          
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