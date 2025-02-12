<?php
include('menu.php');
    $id =$_GET['id'];

    $sql = "SELECT * FROM `tbl_category` WHERE id=$id";

    $res =mysqli_query($con, $sql);

    if($res){
        $count = mysqli_num_rows($res);
        if($count==1){
            $rows = mysqli_fetch_assoc($res);
            $id = $rows['id'];
            $tittle = $rows['title'];
            $current_image = $rows['image_name'];
            $featured = $rows['featured'];
            $active = $rows['active'];
        }else{
            header('location:'.'categories.php');
            die();
        }
    }
?>
<div class="container">
    <h2>Update Category</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td><input type="text" name='title' value="<?php echo $tittle;?>"></td>
            </tr>
            <tr>
                <td>Cureent Image: </td>
                <td>
                    <img src="<?php echo '../images/category/'.$current_image;?>" width="100px" height="100px">
                </td>
            </tr>
            <tr>
                <td>New Image: </td>
                <td><input type="file" name="image"></td>
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
                    <input type="submit" name="submit" value="Update Category">
                </td>
            </tr>
        </tablle>
    </form>
    <?php

        if(isset($_POST['submit'])){
            $id =$_POST['id'];
            $title =$_POST['title'];
            $current_image =$_POST['current_image'];
            $featured = $_POST['featured'];
            $active=$_POST['active'];

            if(isset($_FILES['image']['name'])){
                $image = $_FILES['image']['name'];
                if($image !=""){
                    $ext = end(explode('.',$image));
                    $image ="_HQ_".rand(000,999).".".$ext;
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $path = "../images/category/".$image;
                    
                    $upload = move_uploaded_file($tmp_name, $path);
                    if(!$upload){
                        $_SESSION['update'] ="<div = class='error'>Failed to Upload the Image!</div>";
                        header('location:'.'categories.php');
                        die();
                    }
                    else{
                        if($current_image !=""){
                            $file_path = "../images/category/".$current_image;
                            $remove = unlink($file_path);
    
                            if(!$remove){
                                $_SESSION['failed']="<div class='error'>Failed to Remove the Image!</div>";
                                header('location:'.'categories.php');
                                die();
                            }
                        }
                    }
                }else{
                    $image = $current_image;
                }
            }else{
                $image = $current_image;
            }

            $sql = "UPDATE tbl_category SET 
            title = '$title',
            image_name ='$image',
            featured = '$featured',
            active = '$active'
            WHERE id = $id ";

            $res =mysqli_query($con, $sql);
            if($res){
                echo "<script>
                alert('Category Updated Successfully!');
                window.location='categories.php';
                </script>";
                $_SESSION['update'] = "<div class='success'>Category Updated Successfully!</div>";
            }else{
                $_SESSION['update'] = "<div class'error'>Failed to Update Category!</div>";
                header('location:'.'categories.php');
            }
        }

    ?>
</div>