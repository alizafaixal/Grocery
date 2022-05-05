<?php
$id= '';
$type='';
include('header.inc.php');
$id = clean($conn,$_GET['id']);
// $del_id = clean($conn,$_GET['del_id']);
// $type = clean($conn,$_GET['type']);
// if($type== 'delete'){
//     $sql = "DELETE FROM order_details where id = '$del_id'";
//    $res = mysqli_query($conn, $sql)
//    or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
// }
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
               
                                       <th>id</th>
                                       <th>order id</th>
                                       <th>product name </th>
                                      <th>  product image</th>
                                       <th> product id </th>
                                       <th> qty</th>
                                       <th> price</th>
                                       <th> other options</th>

                                      
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                                 $sql = "SELECT `order_details`.*, `orders`.total_price , product.product_name, product.product_img FROM `order_details` , product , orders WHERE order_details.order_id = '$id' and orders.id = order_details.order_id and product.product_id = order_details.product_id";
                // echo $sql;
                $res = mysqli_query($conn, $sql)
                or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
                while($row = mysqli_fetch_assoc($res)){
                    ?>
                  <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['order_id']?></td>
                    <td><?php echo $row['product_name']?></a></td>
                    <td><img src="<?php echo $row['product_img']?>" alt=""></td>
                    <td><?php echo $row['product_id']?></td>
                    <td><?php echo $row['qty']?></td>
                    <td><?php echo $row['price']?></td>
                    <td>
                
                    
                    <?php $totalprice =  $row['total_price']; }
                ?>   
           
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>total price</td>
              <td><?php echo $totalprice?></td>
            </tr>
            
            
        </table>
<?php
include('footer.inc.php');
?>