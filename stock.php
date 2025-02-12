<?php include('menu.php');?>
<div id="search"><br>
    <form action="search.php" method="post">
        <input type="search" name="search" placeholder="Search for item.." required>
        <button type="submit" name="submit" value="search" class="btn">Search</button>
    </form>
</div>

<div id="wrapper">
    <div class="session">
        <h1 id="explore">Stock Menu</h1>
        <?php
        if(isset($_SESSION['order'])){
            echo $_SESSION['order'];
            unset ($_SESSION['order']);
        }?>
    </div>
    <?php
    $sql = "SELECT * FROM `tbl_stock` WHERE active='Yes'";

    $res = mysqli_query($con, $sql);
    if($res){
        $count = mysqli_num_rows($res);
        if($count>0){
            while($row= mysqli_fetch_assoc($res)){
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