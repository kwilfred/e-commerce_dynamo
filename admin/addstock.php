<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Stock - Page</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php include('menu.php');?>

    <div class="container">
        <div class="wrapper" id="centre"><br><br>
            <h2>Add Stock</h2><br>
            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Title: </td>
                        <td><input type="text" name="title" value=""></td>
                    </tr>
                    <tr>
                        <td>Description: </td>
                        <td><textarea name="description" id="txtA" cols="30" rows="5"></textarea></td>
                    </tr>
                    <tr>
                        <td>Price: </td>
                        <td><input type="text" name="price" value=""></td>
                    </tr>
                    <tr>
                        <td>Image: </td>
                        <td><input type="file" name="image"></td>
                    </tr>
                    <tr>
                        <td>Category: </td>
                        <td><select name="category" id="txtA">
                            <?php
                                $sql = "SELECT * FROM tbl_category WHERE active ='Yes'";
                                $res = mysqli_query($con, $sql);
                                if($res){
                                    $count = mysqli_num_rows($res);
                                    if($count > 0){
                                        while($row = mysqli_fetch_assoc($res)){
                                            $id = $row['id'];
                                            $title = $row['title'];
                                            ?>
                                            <option value="<?php echo $id;?>"><?php echo $title;?></option>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                        <option value="0">No Categories Found</option>
                                        <?php
                                    }
                                }
                            ?>
                        </select></td>
                    </tr>
                    <tr>
                        <td>Featured: </td>
                        <td>
                            <input type="radio" name="featured" value="Yes">Yes
                            <input type="radio" name="featured" value="No"> No
                    </td>
                    </tr>
                    <tr>
                        <td>Active: </td>
                        <td>
                            <input type="radio" name="active" value="Yes">Yes
                            <input type="radio" name="active" value="No">No
                    </td>
                    </tr>
                    <tr>
                        <td><button type="submit" name="submit" value="">Add Stock</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <?php
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        if(isset($_POST['featured'])){
            $featured = $_POST['featured'];
        }else{
            $featured = "No";
        }
        if(isset($_POST['active'])){
            $active = $_POST['active'];
        }else{
            $active = "No";
        }

        if(isset($_FILES['image']['name'])){
            $image = $_FILES['image']['name'];
            if($image !=""){
                $ext = end(explode(".",$image));
                $image = "_HQ_".rand(000,999).".".$ext;
                $src = $_FILES['image']['tmp_name'];
                $path ="../images/stock/".$image;

                $upload = move_uploaded_file($src,$path);

                if(!$upload){
                    $_SESSION['upload'] = "Failed to Upload the Image!";
                    header('location:'.STOCK_URL);
                    die();
                }
            }
            // else{
            //     $_SESSION['upload'] = "<div class='error'>No Image Uploaded</div>";
            // }
            
        }else{
            $image ="";
        }

        $sql ="INSERT INTO `tbl_stock` (title, description, price, image_name, category_id, featured, active)
                values('$title', '$description', $price, '$image', $category, '$featured', '$active')
                ";
        $res = mysqli_query($con, $sql);
        if($res){
            echo "<script>
            alert ('Data Inserted Successfully!');
            window.location = '../stock.php';
            </script>";
            $_SESSION['add-stock'] ="<div class='success'>Stock Added Successfully</div>";
        }else{
            echo "<script>
            alert ('Failed to Insert Data!');
            window.location = '../stock.php';
            </script>";
        }

    }
    ?>

<?php include('footer.php');?>
</body>
</html>