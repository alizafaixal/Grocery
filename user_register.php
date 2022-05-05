<?php
require('conn.inc.php');
require('functions.inc.php');
$name = clean($conn, $_POST['name']);
$email = clean($conn, $_POST['email']);
$password = clean($conn, $_POST['password']);
$count = mysqli_num_rows(mysqli_query($conn, "SELECT * FrOM end_users WHERE email = '$email' ")) ;
if($count>0){
    echo 'email present ';
   
}else{
    $insert = "INSERT INTO end_users (name,email,password) VALUES('$name', '$email', '$password')";
    $res = mysqli_query($conn, $insert)
    or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
    echo 'insert';
}
?>