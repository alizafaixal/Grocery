<?php
require('conn.inc.php');
require('functions.inc.php');
require('add_to_cart.php');
$pid  = clean($conn, $_POST['pid']);
$qty = clean($conn, $_POST['qty']);
$type = clean($conn, $_POST['type']);
$GetProductQtyByProductId = GetProductQtyByProductId($conn , $pid);
$ProductQty = ProductQty($conn , $pid);
$leftQuantity = $ProductQty-$GetProductQtyByProductId;
if($qty> $leftQuantity){
    echo "not_available";
    die();
}
$obj=new add_to_cart();

if($type=='add'){
    $obj->addProduct($pid,$qty);
}
if($type=='remove'){
    $obj->removeProduct($pid);
}
if($type=='update'){
    $obj->updateProduct($pid,$qty);
}

echo $obj->totalProduct();

?>