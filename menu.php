<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Design - Home Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php 
    include("config/connect.php");
    ?>
    <section class="header">
        <nav>
        <div class="nav-links" id="nav-links">
                <i class="fa fa-times" onclick ="hideMenu()"></i>
                <ul>
                    <li><a href="<?php echo HOME_URL;?>">Home</a></li>
                    <li><a href="<?php echo CATEGORIES_URL;?>">Categories</a></li>
                    <li><a href="<?php echo ORDER_URL;?>">Order</a></li>
                    <li><a href="<?php echo STOCK_URL;?>">Products</a></li>
                    <li><a href="<?php echo ADMIN_URL;?>">Admin</a></li>
                    <!-- <li><a href="<?php echo SIGNIN_URL;?>">LOGIN</a></li> -->
                    <li><a href="<?php echo LOGOUT_URL;?>">Logout</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick ="showMenu()"></i>
        </nav>
        <br><br>
        <div class="text-box">
            <h1>E-Commerce Dynamo</h1><br>
            <p>We facilitate online marketing, ensuring seamless transactions and <br> instant delivery of purchased goods to our esteemed customers.<br>
                Join us today.
            </p><br>
            <a href="" class='hero-btn'>Visit Us To Know More</a>
        </div>
    </section>

<script src="index.js"></script>

</body>
</html>