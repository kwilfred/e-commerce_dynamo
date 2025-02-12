<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore categories -Page</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php 
    include("../menu.php");
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM `tbl_stock` WHERE category_id = $id";
        $res = mysqli_query($con, $sql);
        $count = mysqli_num_rows($res);
        if($count > 0){
            while($row = mysqli_fetch_assoc($res)){
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $image = $row['image_name'];
                $desc = $row['description'];
                ?>
                <div class="stock-box">
                <div class="sImg">
                    <?php
                    if($image ==""){
                        echo "<div class='error'>Image Currently Unavailable!</div>";
                    }else{
                        ?>
                        <img src="<?php echo '../images/stock/'.$image;?>" height="100px">
                        <?php
                    }
                    ?>
                </div>
                <div class="desc">
                    <h4><?php echo $title;?></h4>
                    <p class="price"><?php echo "Ksh. ".$price; ?></p>
                    <p class="desc"><?php echo $desc;?></p><br>
                    <a href="../order.php?id=<?php echo $id;?>" class="btn"><button>Order</button></a>
                </div>
                </div>
                <?php
            }
        }else{
            echo "<div class='error'>Category Selected Has no Active Items Currently.</div>";
        }
    }else{
        header('location:'.CATEGORIES_URL);
        die();
    }
    ?>
    <div class="clearfix"></div>
    <?php include("../footer.php");?>
</body>
</html>