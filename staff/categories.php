<?php
include('header.inc.php');
$seqID =1;
 if(isset($_GET['type']) && $_GET['type'] != ''){
   $type = clean($conn,$_GET['type']);
   if($type == 'status'){
      $operation = clean($conn,$_GET['operation']);
      $id = clean($conn,$_GET['id']);
     
      if($operation == 'active'){
         $status = '1';
      }else{
         $status = '0';
      }
      $sql = "UPDATE category set status='$status' WHERE category_id = '$id'";
      mysqli_query($conn, $sql);

   }
   if($type == 'delete'){
      $id = clean($conn,$_GET['id']);
      $sql = "DELETE  FROM category WHERE category_id = '$id'";
      mysqli_query($conn, $sql);

   }
   if($type == 'delete'){
      $id = clean($conn,$_GET['id']);
      $sql = "DELETE  FROM category WHERE category_id = '$id'";
      mysqli_query($conn, $sql);

   }
}
$sql = "SELECT * FROM category ORDER BY category_name desc";
$res = mysqli_query($conn, $sql);
?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title"> Category </h4>
                           <h5 class="box-title"> <a href="add_category.php">Add Category</a> </h5>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
               
                                       <th>Category ID</th>
                                       <th> Category Name</th>
                                       <th> Category Status</th>
                                       <th> other options</th>
                                      
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php while($row= mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                      
                                       
                                       <td> <?php echo $seqID++ ?> </td>
                                       <td> <?php echo $row['category_name'] ?> </td>
                                       <td><?php
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['category_id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['category_id']."'>Deactive</a></span>&nbsp;";
                        }?> </td>
                        <td>
                           <?php
                           echo "<span class='badge badge-edit'><a href='edit_category.php?id=".$row['category_id']."'>Edit</a></span>&nbsp;";
								
                           echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['category_id']."'>Delete</a></span>";
                           ?>
                        </td>
                   
                                      
                                    </tr>
                                    <?php }?>
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