<?php
include('header.php');

if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$order_id= clean($conn, $_GET['id']);

?>

   <div class="small-container cart-page">
        <table>
            <h1 class="title m-40">Order details <small><?php echo $order_id;?></small></h1>
            <tr>
                <th>
                   product name
                </th>
                <th>  product image</th>
                <th>  product qty</th>
                <th>  product price</th>
                <!-- <th>  product total price</th> -->
            </tr>
           
            <tr>
                <?php
                $uid =   $_SESSION['USER_ID'];
                // print_r($_SESSION);

                $sql = "select DISTINCT(order_details.id), order_details.* , orders.total_price, product.product_name, product.product_img from order_details, product, orders where orders.id = '$order_id' and orders.user_id = '$uid' and order_details.product_id = product.product_id and orders.id = order_details.order_id";
                // echo $sql;
                $res = mysqli_query($conn, $sql)
                or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
                while($row = mysqli_fetch_assoc($res)){
                    ?>
                  <tr>
                    <td><?php echo $row['product_name']?></a></td>
                    <td><img src="<?php echo $row['product_img']?>" alt=""></td>
                    <td><?php echo $row['qty']?></td>
                    <td><?php echo $row['price']?></td>
                    
                    <?php $totalprice =  $row['total_price']; }
                ?>   
           
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>total price</td>
              <td><?php echo $totalprice?></td>
            </tr>
            
            
        </table>
        <a href="myorders.php" class="btn">All orders</a>
                </div>
    <?php
// include('footer.php');
?>