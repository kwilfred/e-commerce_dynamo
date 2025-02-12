<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Dynamo</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php 
    include("../config/connect.php");
    include("partials/login-check.php");
    ?>
    <section class="header"> 
        <nav>
            <a href="../partials/login.php"><img src="<?php echo LOGO_URL;?>" alt=""></a>
            <div class="nav-links" id="nav-links">
                <i class="fa fa-times" onclick ="hideMenu()"></i>
                <ul>
                    <li><a href="<?php echo 'dashboard.php';?>">Home</a></li>
                    <li><a href="<?php echo 'categories.php';?>">Categories</a></li>
                    <li><a href="<?php echo 'manageorder.php';?>">Order</a></li>
                    <li><a href="<?php echo 'stock.php';?>">Products</a></li>
                    <li><a href="<?php echo ADMIN_URL;?>">Admin</a></li>
                    <li><a href="<?php echo LOGOUT_URL;?>">Logout</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick ="showMenu()"></i>
        </nav>
        <br><br>
    </section>
    <script >
        var navLinks = document.getElementById('nav-links');
        function showMenu() {
            navLinks.style.right = '0';
        }
        function hideMenu() {
            navLinks.style.right = '-200px';
        }
        let cont = document.getElementById('container');
        cont.style.backgroundColor = 'gray';
    </script>