<?php
include('header.php');

if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}elseif (isset( $_GET['type'])){
    $type= mysqli_real_escape_string($conn, $_GET['type']);
    $id= mysqli_real_escape_string($conn, $_GET['id']);
    if($type == 'cancel'){
        $res = mysqli_query($conn, "UPDATE orders SET order_status = 4 WHERE id = '$id'");
    
        ?>
        <script>
        window.location.href='myorders.php';
        </script>
  <?php  
} if($type == 'uncancel'){
    $res = mysqli_query($conn, "UPDATE orders SET order_status = 1 WHERE id = '$id'");
    ?>
    <script>
    window.location.href='myorders.php';
    </script>
<?php  
}
}

?>

   <div class="small-container cart-page">
        <table>
            <h1>My orders</h1>
            <tr>
                <th>
                    Order ID
                </th>
                <th> Order Date</th>
                <th> Address</th>
                <th> Payment Method</th>
                <th> Payment status</th>
                <th> order status</th>
                <th> Action</th>
            </tr>
           
            <tr>
                <?php
                $uid =   $_SESSION['USER_ID'];
                $res = mysqli_query($conn, "select orders.*, order_status.name from orders INNER JOIN order_status ON order_status.id = orders.order_status where user_id= '$uid'");
                while($row = mysqli_fetch_assoc($res)){?>
                  <tr>
                    <td><a  class="btn" href="myOrderDetails.php?id=<?php echo $row['id']?>"><?php echo $row['id']?></a></td>
                    <td><?php echo $row['added_on']?></td>
                    <td><?php echo $row['address']?></td>
                    <td><?php echo $row['payment_type']?></td>
                    <td><?php echo $row['payment_status']?></td>
                    <td><?php echo $row['name']?></td>
                   <?php if ($row['order_status'] == 1){?>
                        <td><a href="myorders.php?id=<?php echo $row['id']?>&type=cancel">Cancel Order</a></td>
                  <?php }else{?>
                       <td><a href="myorders.php?id=<?php echo $row['id']?>&type=uncancel">UnCancel Order</a></td>
                 <?php }
                    
             
                     }
                ?>
            </tr>
            
            
        </table>
                </div>
    <?php
include('footer.php');
?>