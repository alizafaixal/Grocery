<?php
include('header.php');

//  prx($_SESSION);
 $productArr  = array();
?>
   <!-- cart items details -->
   <div class="small-container cart-page">
        <table>
            <tr>
                <th>
                    Product
                </th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
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
                     $mrp = $productArr[0]['product_mrp'];
                     $price = $productArr[0]['product_price'];
                     $img = $productArr[0]['product_img'];
                     $qty = $val['qty'];
                     $cart_total = $cart_total+($price*$qty);
                ?>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="<?php echo $img; ?>" alt="">
                        <div>
                            <p><?php echo $pname; ?></p>
                            <small><?php echo $mrp; ?></small> <br>
                            <small><?php echo $price; ?></small> <br>
                            <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>', 'remove')">Remove</a>
                        </div>
                    </div>
                </td>
                <td><input type="number" id="<?php echo $key?>qty" value="<?php echo $qty?>"> <br>
                <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key;?>','update')">Update</a>
            </td>
                <td><?php echo $price * $qty; ?></td>
            </tr>
            <?php }} //end of foreach loop ?>
            
        </table>
        <div class="total-price">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td><?php echo $cart_total ;?></td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$0</td>
                </tr>
                <tr>
                    <td>total</td>
                    <td><?php echo $cart_total  ;?> </td>
                </tr>
            </table>
        </div>
        <a href="products.php" class="btn">Continue shopping</a>
        <a href="checkout.php" class="btn">Checkout</a>
    </div>
    <?php
include('footer.php');
?>