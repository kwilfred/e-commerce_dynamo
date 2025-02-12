
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
<?php include('menu.php');?>

<div id="search"><br>
    <form action="search.php" method="post">
        <input type="search" name="search" placeholder="Search for item.." required>
        <button type="submit" name="submit" value="search" class="btn">Search</button>
    </form>
</div>
<div class="session"></div>
<h1 id="explore">Explore Categories</h1>
<div id="wrapper">
    <?php
    $sql  = "SELECT * FROM `tbl_category` WHERE active='Yes' AND featured='Yes' LIMIT 3";

    $res = mysqli_query($con, $sql);
    if($res){
        $count = mysqli_num_rows($res);
        if($count > 0){
            while($row = mysqli_fetch_assoc($res)){
                $id = $row['id'];
                $title = $row['title'];
                $imageName = $row['image_name'];
                ?>
                <a href="partials/explore.php?id=<?php echo $id?>">
                    <div class="box-3">
                        <?php 
                        if($imageName ==""){
                            echo "<div class='error'>Image Name Not Available!</div>";
                        }else{
                            ?>
                            <img src="<?php echo 'images/category/'.$imageName;?>" height="150px">
                            <?php
                        }
                        ?>
                        <h3 class="txt-white"><?php echo $title;?></h3>
                    </div></a>
                <?php
            }
        }else{
            echo "<div class='error'>No Categories Available!</div>";
        }
    }?>
</div></div>
<div class='clearfix'></div>
<div id="wrapper">
    <h1 id="explore">Stock Menu</h1>
    <?php
    $sql2 = "SELECT * FROM `tbl_stock` WHERE featured='Yes' AND active='Yes'";

    $res2 = mysqli_query($con, $sql2);
    if($res2){
        $count = mysqli_num_rows($res2);
        if($count>0){
            while($row= mysqli_fetch_assoc($res2)){
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
                        <img src="<?php echo 'images/stock/'.$image;?>" height="100px">
                        <?php
                    }
                    ?>
                </div>
                <div class="desc">
                    <h4><?php echo $title;?></h4>
                    <p class="price"><?php echo "Ksh. ".$price; ?></p>
                    <p class="desc"><?php echo $desc;?></p><br>
                    <a href="order.php?id=<?php echo $id;?>" class="btn"><button>Order</button></a>
                </div>
</div>
                <?php
            }
        }else{
            echo "<div class='error'>The Stock is Currently Unavailable!</div>";
        }
    }
    ?>
</div>
<div class='clearfix'></div>
<?php include('footer.php');?>

</body>
</html>