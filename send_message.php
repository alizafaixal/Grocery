<?php
require('conn.inc.php');
require('functions.inc.php');
$name = clean($conn, $_POST['name']);
$email = clean($conn, $_POST['email']);
$number = clean($conn, $_POST['number']);
$EnquiryTopic = clean($conn, $_POST['EnquiryTopic']);
$message = clean($conn, $_POST['message']);
$added_on = date('Y-m-d h:i:s');
$sql = "INSERT INTO contact_us(user_name,user_email,user_number,user_EnquiryTopic,user_message,added_on)
        VALUES('$name','$email','$number','$EnquiryTopic','$message','$added_on')";
  $res = mysqli_query($conn, $sql)
  or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
  echo "message sent";
?>