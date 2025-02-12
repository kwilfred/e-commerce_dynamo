<?php 
//Start Session
session_start();
//create constants
define("HOME_URL","http://localhost/onlineshop/index.php");
define("MENU_URL","http://localhost/onlineshop/menu.php");
define("FOOTER_URL","http://localhost/onlineshop/footer.php");
define("CATEGORIES_URL","http://localhost/onlineshop/categories.php");
define("ORDER_URL","http://localhost/onlineshop/order.php");
define("ADMIN_URL","http://localhost/onlineshop/admin/index.php");
define("STOCK_URL","http://localhost/onlineshop/stock.php");
define("SIGNIN_URL","http://localhost/onlineshop/admin/signin.php");
define("LOGOUT_URL","http://localhost/onlineshop/admin/logout.php");
define("LOGO_URL","http://localhost/onlineshop/images/d.jpg");
define("LOCALHOST","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
define("DB_NAME","onlineshop");
$con = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$con){
    die(mysqli_error($con));
}
?>