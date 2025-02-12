<?php include('menu.php') ?>
    <section>

        <div id="search">
            <h1 id="explore">Explore Categories</h1>
            <input type="search" placeholder="Search">
        </div>
        <div class="main-content">
            <div class="cont">
                <h1>Manage Category</h1><br>
                <?php
                    if(isset($_SESSION['addc'])){
                        echo $_SESSION['addc'];
                        unset($_SESSION['addc']);
                    }
                    if(isset($_SESSION['upload'])){
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['remove'])){
                        echo $_SESSION['remove'];
                        unset($_SESSION['remove']);
                    }
                    if(isset($_SESSION['category'])){
                        echo $_SESSION['category'];
                        unset($_SESSION['category']);
                    }
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    if(isset($_SESSION['failed'])){
                        echo $_SESSION['failed'];
                        unset($_SESSION['failed']);
                    }
                ?><br>

                <a href="addcategory.php"><button class="btn-admin">Add Category</button></a><br><br>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Category Title</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                    <tr>
                        <?php
                        $sql = "SELECT *FROM `tbl_category`";
                        $res = mysqli_query($con,$sql);
                        if($res){
                            $count =mysqli_num_rows($res);
                            $num = 1;
                            if($count > 0){
                                while($rows = mysqli_fetch_assoc($res)){
                                $id = $rows['id'];
                                $title = $rows['title'];
                                $image_Name = $rows['image_name'];
                                $featured = $rows['featured'];
                                $active = $rows['active'];
                        ?>
                    </tr>
                    <tr>
                        <td><?php echo $num++;?> </td>
                        <td><?php echo $title;?> </td>
                        <td>
                            <?php 
                            if($image_Name !=""){
                            ?>
                                <img src="<?php echo '../images/category/'.$image_Name;?>" width="100px" height="100px">
                            <?php
                            }else{
                                echo "<div class='error'> No Image Added</div>";
                            }
                            ?>
                        </td>
                        <td><?php echo $featured;?> </td>
                        <td><?php echo $active;?> </td>
                        <td>
                            <a href="updatecategory.php?id=<?php echo $id;?>"><button type="submit" id='update'>Update Category</button></a>
                            <a href="deletecategory.php?id=<?php echo $id;?>&image_name=<?php echo $image_Name;?>"><button type="submit" id='delete'>Delete Category</button></a>
                        </td>
                    </tr>
                        <?php
                                }
                            }
                        }
                        ?>
                </table>
            </div>
        </div>
        
        <div class="clearfix"></div>

    </section>
        
<?php include('footer.php') ?>