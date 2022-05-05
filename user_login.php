<?php
require('conn.inc.php');
require('functions.inc.php');
$name = clean($conn, $_POST['name']);
$password = clean($conn, $_POST['password']);
$sql = "SELECT * FROM end_users WHERE name = '$name' AND password = '$password' ";
$res = mysqli_query($conn, $sql)
or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
$count = mysqli_num_rows( $res);
if($count>0){
    $row = mysqli_fetch_assoc($res);
    $_SESSION['USER_LOGIN'] ='yes';
    $_SESSION['USER_ID'] =$row['user_id'];
    $_SESSION['USER_NAME'] =$row['name'];
    echo 'valid';
    header('location:index.php');
}else{
    echo 'wrong';
}
?>