<?php
include("menu.php");
if(isset($_POST['submit'])){
$search = $_POST['search'];
?>
<div id="wrapper">
    <h2 id="explore"><?php echo 'You Search "'.$search.'"';?></h2>
    <?php
    $sql = "SELECT * FROM `tbl_stock` WHERE title LIKE '%$search%' OR description LIKE '%$search%' ";

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
                    <a href="" class="btn"><button>Order</button></a>
                </div>
</div>
                <?php
            }
        }else{
            echo "<div class='error'>Item is Currently Unavailable!</div>";
        }
    }
}
?>
<div class="clearfix"></div>
<?php include("footer.php");?>