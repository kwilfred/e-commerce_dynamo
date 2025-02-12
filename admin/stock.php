<?php include('menu.php') ?>

<section>
    <div class="main-content">
        <div class="cont">
            <br><br>
            <h1>Manage Stock</h1><br>
            
            <?php
            if(isset($_SESSION['add-stock'])){
                echo $_SESSION['add-stock'];
                unset($_SESSION['add-stock']);
            }
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            if(isset($_SESSION['order'])){
                echo $_SESSION['order'];
                unset ($_SESSION['order']);
            }
            ?>

            <a href="addstock.php"><button class="btn-admin">Add Stock</button></a><br><br>

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <?php
                    $sql ="SELECT * FROM `tbl_stock`";
                    $res = mysqli_query($con, $sql);

                    if($res){
                        $count = mysqli_num_rows($res);
                        if($count > 0){
                            $num = 1;
                            while($row =mysqli_fetch_assoc($res)){
                                $id = $row['id'];
                                $title =$row['title'];
                                $price = $row['price'];
                                $image = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>
                </tr>
                <tr>
                                    <td><?php echo $num++; ?> </td>
                                    <td><?php echo $title;?></td>
                                    <td><?php echo $price;?></td>
                                    <td>
                                        <?php 
                                        if($image !=""){?>
                                            <img src="<?php echo '../images/stock/'.$image;?>" width="100px" height="100px">
                                        <?php
                                        }else{
                                            echo "<div class='error'> No Image Added</div>";
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $featured?></td>
                                    <td><?php echo $active;?></td>
                                    <td>
                                        <a href="updatestock.php?id=<?php echo $id?>"><button type="submit" id='update'>Update Stock</button></a>
                                        <a href="deletestock.php?id=<?php echo $id?>&imageName=<?php echo $image?>"><button type="submit"id='delete'>Delete Stock</button></a>
                                    </td>
                                <?php
                            }
                        }
                    }
                    ?>
                </tr>
            </table>
        </div>
    </div>

</section>
    
<?php include('footer.php') ?>