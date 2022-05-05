<?php
include('header.inc.php');
$products = array();
$sql = "select product.* , category.category_name from product, category where product.category_id = category.category_id";
$res = mysqli_query($conn,$sql)
or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
while($row = mysqli_fetch_assoc($res)){
$products[] = $row;
}
if(isset($_GET['type']) && $_GET['type'] != ''){
    $type = clean($conn, $_GET['type']);
    $id = clean($conn,$_GET['id']);
    if($type == 'status'){
        $operation = clean($conn,$_GET['operation']);

        if($operation == 'active'){
           $status = '1';
        }else{
            $status = '0';
        }
        $sql = "UPDATE `product` SET product_status= '$status' WHERE product_id = '$id'";
        mysqli_query($conn, $sql)
        or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
    }
    if($type == 'delete'){
        $sql = " DELETE FROM product WHERE product_id = '$id'";
        $res= mysqli_query($conn, $sql)
        or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
      if($res){
         ?>
         <script>
         window.location.href= 'products.php';
         </script>
         <?php
      }
    }
    
}
// print_r($products);
?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title"> Products </h4>
                           <h5 class="box-title"> <a href="add_product.php">Add Products</a> </h5>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
               
                                       <th>Product ID</th>
                                       <th>Category ID</th>
                                       <th> Category Name</th>
                                       <th> Product Name</th>
                                       <th> Product Mrp</th>
                                       <th> Product price</th>
                                       <th> Product qty</th>
                                       <th> Product img</th>
                                       <th> Product short desciption</th>
                                       <th> Product desciption</th>
                                       <th> product meta title</th>
                                       <th> product meta desc</th>
                                       <th> product meta keywords</th>
                                       <th> product status</th>
                                       <th> other options</th>

                                      
                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                     foreach($products as $list){?>
                                     <tr>
                                     <td><?php echo $list['product_id'] ?></td>
                                     <td><?php echo $list['category_id'] ?></td>
                                     <td><?php echo $list['category_name'] ?></td>
                                     <td><?php echo $list['product_name'] ?></td>
                                     <td><?php echo $list['product_mrp'] ?></td>
                                     <td><?php echo $list['product_price'] ?></td>
                                     <td><?php echo $list['product_qty'] ?></td>
                                     <td><img src="<?php echo $list['product_img'] ?>" alt=""></td>
                                     <td><?php echo $list['product_short_desc'] ?></td>
                                     <td><?php echo $list['product_desc'] ?></td>
                                     <td><?php echo $list['product_meta_title'] ?></td>
                                     <td><?php echo $list['product_meta_desc'] ?></td>
                                     <td><?php echo $list['product_meta_keywords'] ?></td>
                                     <td>  <?php
                                        if($list['product_status'] == 1){
                                          	echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$list['product_id']."'>Active</a></span>&nbsp;";
                                         }else{
                                        
                                        	echo "<span class='badge badge-complete'><a href='?type=status&operation=active&id=".$list['product_id']."'>DeActive</a></span>&nbsp;";
                                     } ?></td>
                                     <td>
                                         <?php
                                         echo "<span class='badge badge-edit'><a href='edit_product.php?id=".$list['product_id']."'>Edit</a></span>&nbsp;";
                                         ?>
                                            <?php
                                         echo "<span class='badge badge-delete'><a href='?type=delete&id=".$list['product_id']."'>Delete</a></span>&nbsp;";
                                         ?>
                                     </td>
                                     </tr>

                                  <?php   }
                                     ?>
                                   
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
         <div class="clearfix"></div>
<?php
include('footer.inc.php');
?>