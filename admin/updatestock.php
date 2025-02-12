<?php
include('menu.php');
$id =$_GET['id'];

$sql = "SELECT * FROM `tbl_stock` WHERE id=$id";

$res =mysqli_query($con, $sql);

if($res){
    $count = mysqli_num_rows($res);
    if($count==1){
        $rows = mysqli_fetch_assoc($res);
        $tittle = $rows['title'];
        $description = $rows['description'];
        $price = $rows['price'];
        $current_image = $rows['image_name'];
        $category = $rows['category_id'];
        $featured = $rows['featured'];
        $active = $rows['active'];
    }else{
        header('location:'.'stock.php');
        die();
    }
    }

?>
<div class="container">
    <h2>Update Stock</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td><input type="text" name='title' value="<?php echo $tittle;?>"></td>
            </tr>
            <tr>
                <td>Description: </td>
                <td><textarea name="description" cols="30" rows="10"><?php echo $description;?></textarea></td>
            </tr>
            <tr>
                <td>Price: </td>
                <td><input type="text" name='price' value="<?php echo 'Ksh. '. $price;?>"></td>
            </tr>
            <tr>
                <td>Cureent Image: </td>
                <td>
                    <?php
                    if($current_image ==""){
                        echo "<div class='error'>No File Uploaded</div>";
                    }else{
                        ?>
                        <img src="<?php echo '../images/stock/'.$current_image;?>" width="100px" height="100px">
                        <?php
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>New Image: </td>
                <td><input type="file" name="image"></td>
            </tr>
            <tr>
                <td>Category: </td>
                <td>
                    <select name="category">
                        <?php
                        $sql ="SELECT * FROM `tbl_category` WHERE active='Yes'";
                        $res = mysqli_query($con, $sql);

                        if($res){
                            $count = mysqli_num_rows($res);
                            if($count>0){
                                while($row = mysqli_fetch_assoc($res)){
                                    $categoryId = $row['id'];
                                    $categoryTitle = $row['title'];
                                    ?>
                                    <option <?php if($category == $categoryId){ echo "selected";}?> 
                                    value="<?php echo $categoryId;?>"><?php echo $categoryTitle;?></option>
                                    <?php
                                }
                            }else{
                                echo "<option value='0'>No Category Found</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Featured: </td>
                <td>
                    <input <?php if($featured =='Yes'){ echo 'checked';}?> type="radio" name="featured" value="Yes">Yes
                    <input <?php if($featured =='No'){ echo 'checked';}?> type="radio" name="featured" value="No">No
                </td>
            </tr>
            <tr>
                <td>Active: </td>
                <td>
                    <input <?php if($active =='Yes'){ echo 'checked';}?> type="radio" name="active" value="Yes">Yes
                    <input <?php if($active =='No'){ echo 'checked';}?> type="radio" name="active" value="No">No
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name='id' value="<?php echo $id;?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <input type="submit" name="submit" value="Update Stock">
                </td>
            </tr>
        </tablle>
    </form>
    <?php

        if(isset($_POST['submit'])){
            $id =$_POST['id'];
            $title =$_POST['title'];
            $description = $_POST['description'];
            $current_image =$_POST['current_image'];
            $category = $_POST['category'];
            $featured = $_POST['featured'];
            $active=$_POST['active'];

            if(isset($_FILES['image']['name'])){
                $image = $_FILES['image']['name'];
                if($image !=""){
                    $ext = end(explode('.',$image));
                    $image ="_HQ_".rand(000,999).".".$ext;
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $path = "../images/stock/".$image;
                    
                    $upload = move_uploaded_file($tmp_name, $path);
                    if($upload){
                        if($current_image !=""){
                            $remove = unlink("../images/stock/".$current_image);
                            if(!$remove){
                                $_SESSION['failed']="<div class='error'>Failed to Remove the Image!</div>";
                                header('location:'.'stock.php');
                                die();
                            }
                        }
                    }
                    else{
                        $_SESSION['update'] ="<div = class='error'>Failed to Upload the Image!</div>";
                        header('location:'.'stock.php');
                        die();
                        
                    }
                }else{
                    $image = $current_image;
                }
            }else{
                $image = $current_image;
            }

            $sql = "UPDATE `tbl_stock` SET 
            title = '$title',
            description = '$description',
            image_name ='$image',
            category_id ='$category',
            featured = '$featured',
            active = '$active'
            WHERE id = $id ";

            $res =mysqli_query($con, $sql);
            if($res){
                echo "<script>
                alert('Stock Updated Successfully!');
                window.location='stock.php';
                </script>";
                $_SESSION['update'] = "<div class='success'>Stock Updated Successfully!</div>";
            }else{
                $_SESSION['update'] = "<div class'error'>Failed to Update Stock!</div>";
                header('location:'.'stock.php');
            }
        }

    ?>
</div>