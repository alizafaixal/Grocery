<?php
if(!isset($_SESSION)){
session_start();
}
$conn = mysqli_connect('localhost' , 'mfhanuvt_bbhe' , 'Aliza123#@!', 'mfhanuvt_grocery');
if(mysqli_connect_errno()){
    echo "Database connection error " . mysqli_connect_error();
}


// if(!isset($_SESSION)){
//     session_start();
//     }
//     $conn = mysqli_connect("localhost","root","", "grocery_store");
//     if(mysqli_connect_errno()){
//         echo "Database connection error " . mysqli_connect_error();
//     }
?>
