<?php
include('header.php');

//  print_r(count($_SESSION['cart'])) ;
  if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {?>
 <script>
   window.location.href= 'products.php';
 </script> 
  
 <?php  } 
    $cart_total = 0;
    foreach($_SESSION['cart'] as $key=> $val){
       $sql = "SELECT product_name, product_mrp, product_price, product_img FROM product where product_id= '$key'";
       $res = mysqli_query($conn, $sql)
         or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
         $productArr = array();
         while($row = mysqli_fetch_assoc($res)){
             $productArr[] = $row;
         }
       // print_r( $productArr);
        $pname = $productArr[0]['product_name'];
        $price = $productArr[0]['product_price'];
        $img = $productArr[0]['product_img'];
        $qty = $val['qty'];
        $cart_total = $cart_total+ ($price*$qty);
    }
    
    $productArr= array();
if(isset($_POST['submit'])){
   $address=clean($conn, $_POST['address']);
   $city=clean($conn, $_POST['city']);
   $zip=clean($conn, $_POST['zip']);
   $PaymentMethod=clean($conn, $_POST['PaymentMethod']);
   $user_id = $_SESSION['USER_ID'];
   $payment_status = 'pending';
     $order_status = 1;
     $added_on = date('Y-m-d h:i:s');
     $sql = "INSERT INTO `orders`(`user_id`,`address`,city,zipcode,payment_type,total_price,payment_status,order_status,added_on
     ) VALUES('$user_id','$address','$city','$zip','$PaymentMethod', '$cart_total','$payment_status','$order_status','$added_on')";
     mysqli_query($conn,$sql)
     or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
 
 $order_id = mysqli_insert_id($conn); 
 foreach($_SESSION['cart'] as $key=> $val){
  $sql = "SELECT product_price FROM product where product_id= '$key'";
  $res = mysqli_query($conn, $sql)
    or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
    $productArr = array();
    while($row = mysqli_fetch_assoc($res)){
        $productArr[] = $row;
    }
   $price = $productArr[0]['product_price'];
   $qty = $val['qty'];
   $cart_total = $cart_total+ ($price*$qty);
   $sql = "INSERT INTO `order_details`(order_id,	product_id,	qty,	price
   ) VALUES('$order_id','$key', '$qty', $price)";
  $res =  mysqli_query($conn,$sql)
   or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
   
}

unset($_SESSION['cart']);
   unset($_SESSION['pid']);
   unset($_SESSION['qty']);
   unset($_SESSION['totalPrice']);?>
<script>
window.location.href='thankyou.html';
</script>

 <?php }
 

   ?>

<?php
if(!isset($_SESSION['USER_LOGIN'])){?>
 <script>
   window.location.href="login.php";
 </script>

                    <?php }else{
?>
 <div class="row3">
  <div class="col-75">
    <div class="container ">
      <form action="checkout.php" method="post">

        <div class="row3">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York">
            
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">

            <div class="row3">
              <div class="col-50">
                
              </div>
              <div class="col-50">
                
              </div>
            </div>
          </div>

          <div class="col-75">
            <h3>Payment</h3>
           <label for="cod">Cash on Delivery(COD)</label> <input name="PaymentMethod" type="radio" value="cod" id="cod">
          
          </div>

        </div>
        <input type="submit" name="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>
                    <?php } ?>

  <div class="col-25 cart-box">
    <div class="container ">
      <h4>Cart
        <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i>
          <b><?php echo $totalProduct; ?></b>
        </span>
      </h4>
      <?php if(isset($_SESSION['cart'])){
        $cart_total = 0;
                 foreach($_SESSION['cart'] as $key=> $val){
                    $sql = "SELECT product_name, product_mrp, product_price, product_img FROM product where product_id= '$key'";
                    $res = mysqli_query($conn, $sql)
                      or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
                      $productArr = array();
                      while($row = mysqli_fetch_assoc($res)){
                          $productArr[] = $row;
                      }
                    // print_r( $productArr);
                     $pname = $productArr[0]['product_name'];
                     $price = $productArr[0]['product_price'];
                     $img = $productArr[0]['product_img'];
                     $qty = $val['qty'];
                     $cart_total = $cart_total+ ($price*$qty);
                ?>
        <tr>
                <td>
                    <div class="cart-info">
                        <img src="<?php echo $img; ?>" alt="">
                        <div>
                            <p><?php echo $pname; ?></p>
                           
                            <small>$<?php echo $price; ?></small> <br>
                            <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>', 'remove')">Remove</a>
                        </div>
                    </div>
                </td>
                <td><input type="number" id="<?php echo $key?>qty" value="<?php echo $qty?>"> <br>
                <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key;?>','update')">Update</a>
            </td>
                <td><?php echo '$' . $price * $qty; ?></td>
            </tr>
            <?php }} //end of foreach loop ?>
      <hr>
      <?php

    
     ?>
      <p>Total <span class="price" style="color:black"><b><?php   echo $cart_total;?></b></span></p>
    </div>
  </div>
</div>
    <?php
include('footer.php');

?>