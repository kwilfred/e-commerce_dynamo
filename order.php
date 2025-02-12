<?php include('menu.php')?>

<div id="container"><br>
    <h2>Fill this Form to Confirm your Order</h2><br>
    <form action="" method="post">
        <fieldset>
            <legend>Selected Item</legend>
            <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM `tbl_stock` WHERE id=$id";
                $res = mysqli_query($con, $sql);
                $count = mysqli_num_rows($res);
                if($count == 1){
                    while($row = mysqli_fetch_assoc($res)){
                        $title = $row['title'];
                        $price = $row['price'];
                        $image = $row['image_name'];

                        if($image ==""){
                            echo '<div class="error">No Image Available</div>';
                        }else{
                            ?>
                            <img src="images/stock/<?php echo $image;?>" width="150px">
                            <?php   
                        }
                        ?>
                        <div class="dscb">
                            <input type="hidden" name="title" value="<?php echo $title;?>">
                            <p><h4><?php echo $title;?></h4></p>
                            <input type="hidden" name="price" value="<?php echo $price;?>">
                            <p>Ksh. <?php echo $price;?></p>
                            <label for="">Quantity</label><br>
                            <input type="number" name="quantity">
                        </div><br>
                        <?php      
                    }
                }else{
                    header('location:'.STOCK_URL);
                    die();
                }
            }else{
                header('location:'.STOCK_URL);
                die();
            }
            ?>
        </fieldset><br>
        <fieldset>
            <legend>Delivery Details</legend><br>
            <label for="">Full Name</label><br>
            <input type="text" name="fName" placeholder="eg Vijy Thapa" required ><br><br>
            <label for="">Phone Number</label><br>
            <input type="text" name="phone" placeholder="eg 07XXXXXXXX" required><br><br>
            <label for="">Email</label><br>
            <input type="email" name="email" placeholder="eg example@gmail.com" required><br><br>
            <label for="">Address</label><br>
            <textarea name="address" placeholder="eg City, Estate, Town" cols="30" rows="5" required></textarea><br><br>
            
            <a href="manage-odrer.php?id=<?php echo $id?>"><button type="submit" name="submit">Confirm Order</button></a>
        </fieldset>
    </form>
</div>
<?php 

if(isset($_POST['submit'])){
    $item = $_POST['title'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $total = $price * $quantity;
    $oDate = date("y-m-d h:m:ap");
    $status = "Ordered";
    $cName = $_POST['fName'];
    $cContact = $_POST['phone'];
    $cEmail = $_POST['email'];
    $cAddress = $_POST['address'];

    $sql = "INSERT INTO tbl_order (food, price, qty, total, order_date, status, 
            c_name, c_contact, c_email, c_address) values(
            '$item', $price, $quantity, $total, '$oDate', '$status', '$cName', '$cContact', 
            '$cEmail', '$cAddress')";
    $res = mysqli_query($con, $sql);
    if($res){
        $_SESSION['order'] = "<div class='success'>Order Subited Successfully!</div>";
        header('location:'.ORDER_URL);
    }else{
        $_SESSION['order'] = "<div class='error'>Ooops! Something Went Wrong,Please Try Again!</div>";
        header('location:'.STOCK_URL);
        die();
    }
}

include('footer.php')
?>