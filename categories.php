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
    $sql  = "SELECT * FROM `tbl_category` WHERE active='Yes'";

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
<?php include('footer.php');?>