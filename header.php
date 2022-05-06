<?php
require_once('functions.inc.php');
require_once('add_to_cart.php');
require('conn.inc.php');
$obj =new add_to_cart();
$totalProduct=$obj->totalProduct(); 
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery Shop</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="home_navbar">
                <div class="logo">
                  <a href="index.php"> <img src="images/logo.JPG" alt="logo"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="products.php">Product</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <?php if (isset($_SESSION['USER_LOGIN'])){ ?>
                            <li><a href="logout.php">Logout</a></li>
                            <li><a href="myorders.php">My orders</a></li>
                        <?php }else{ ?>
                            <li><a href="login.php">Login/Register</a></li>
                       <?php } ?>
                      

                    </ul>
            
                    <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                    <a href="#"><span class="total"><?php echo $totalProduct;?></span></a>
                   
                </nav>
            </div>
</div>
</div>