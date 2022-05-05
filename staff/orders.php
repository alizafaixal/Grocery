<?php
include('header.inc.php');
$sql = "SELECT * FROM orders ORDER BY `added_on` desc";
$orders = array();
$res = mysqli_query($conn, $sql)
or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
while($row = mysqli_fetch_array($res)){
    $orders[] = $row;
}
// print_r($orders);
if(isset($_GET['type']) && $_GET['type'] != ''){
$id = clean($conn, $_GET['id']);
$type = clean($conn, $_GET['type']) ;
if($type=='delete'){
   $sql = "DELETE FROM orders where id = '$id'";
   $res = mysqli_query($conn, $sql)
   or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
   
}}
?>


         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title"> Orders </h4>
                  
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
               
                                       <th>order id</th>
                                       <th>user id</th>
                                       <th> address</th>
                                       <th> city</th>
                                       <th> zipcode</th>
                                       <th> payment type</th>
                                       <th> total price</th>
                                       <th> payment status</th>
                                       <th> order status</th>
                                       <th> added on</th>
                                       <th> other options</th>

                                      
                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                     foreach($orders as $list){?>
                                     <tr>
                                     <td><a  class="btn" href="orderDetails.php?id=<?php echo $list['id']?>"><?php echo $list['id']?></a></td>
                                     <td><?php echo $list['user_id'] ?></td>
                                     <td><?php echo $list['address'] ?></td>
                                     <td><?php echo $list['city'] ?></td>
                                     <td><?php echo $list['zipcode'] ?></td>
                                     <td><?php echo $list['payment_type'] ?></td>
                                     <td><?php echo $list['total_price'] ?></td>
                                     <td><?php echo $list['payment_status'] ?></td>
                                     <td><?php echo $list['order_status'] ?></td>
                                     <td><?php echo $list['added_on'] ?></td>
                                     <td>
                                            <?php
                                         echo "<span class='badge badge-delete'><a href='?type=delete&id=".$list['id']."'>Delete</a></span>&nbsp;";
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