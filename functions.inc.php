<?php
require('conn.inc.php');
function pr($arr){
    echo '<pre>';
    print_r($arr);
}
function prx($arr){
    echo '<pre>';
    print_r($arr);
    die();
}
function clean($conn, $str){
    if($str != ''){
    return mysqli_real_escape_string($conn, $str); 
    }
}
function get_product($conn, $limit='', $category_id='', $product_id=''){
    $sql = "SELECT product.* , category.category_id, category.category_name FROM product , category where product.product_status = 1 ";
    if($category_id !=''){
        $sql.= ' AND product.category_id= ' . $category_id;
    }
    if($product_id !=''){
        $sql.= ' AND product.product_id= ' . $product_id ;
    }
    $sql.= ' and product.category_id= category.category_id';
   
    if($limit!=''){
        $sql.= ' LIMIT ' . $limit ;
    }
  
    $res = mysqli_query($conn, $sql)
    or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
    $data = array();
    while($row = mysqli_fetch_assoc($res)){
        $data[] = $row;
    }
    return $data;
}
function GetProductQtyByProductId($conn , $pid){
    $sql = "SELECT SUM(order_details.qty) as qty FROM `order_details` INNER JOIN orders ON  orders.id = order_details.order_id  WHERE order_details.product_id = '$pid' AND orders.order_status != 4";
    $res = mysqli_query($conn, $sql)
    or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
    $data = array();
    $row = mysqli_fetch_assoc($res);
       return $row['qty'];
}
function ProductQty($conn , $pid){
    $sql = "SELECT product_qty FROM `product` where product_id = '$pid'";
    $res = mysqli_query($conn, $sql)
    or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
    $row = mysqli_fetch_assoc($res);
       return $row['product_qty'];
}
?>