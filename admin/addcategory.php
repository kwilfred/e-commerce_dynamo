<?php include('menu.php') ?>
<div class="container">
    <h2>Add Category</h2>
    <div class="wrapper">
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td><input type="text" name="title" placeholder="Category Title">
                </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" Value="Yes">Yes
                        <input type="radio" name="featured" Value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" Value="Yes">Yes
                        <input type="radio" name="active" Value="No">No
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="submit" value="Add_Category">Submit</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
if(isset($_POST['submit'])){
    $title =$_POST['title'];
    //for radio buttons
    if(isset($_POST['featured'])){
        $featured = $_POST['featured'];
    }else{//default values
        $featured = 'No';
    }
    if(isset($_POST['active'])){
        $active = $_POST['active'];
    }else{//default values
        $active = 'No';
    }
    //check whether image is selected or not
    if(isset($_FILES['image']['name'])){
        $image = $_FILES['image']['name'];//file name
        if($image !=""){
            $ext = end(explode('.',$image));
            $image ="HQ_".rand(000,999).".".$ext;
            $tmp_name = $_FILES['image']['tmp_name'];//source_path
            $upload = move_uploaded_file($tmp_name,'../images/category/'.$image);

            if(!$upload){
                $_SESSION['upload'] ="Failed to Upload the Image";
                header('location:'.CATEGORIES_URL);
                die();
            }
        }
    }else{
        $image = "";
    }

    //print_r($_FILES['image']);
    $sql ="INSERT INTO `tbl_category` (title, image_name, featured, active)
    values('$title','$image','$featured','$active')";

    $res = mysqli_query($con, $sql);
                                                     
    if($res){
        echo "<script>
        alert('Category Added successfully!');
        window.location= '../categories.php';
        </script>";
        $_SESSION['addc'] ='<div class="success">Category Added successfully!</div>';
    }else{
        $_SESSION['addc'] ='<div class="error">Failed to Add Category!</div>';
        header('location:'.CATEGORIES_URL);
    }
}

include('footer.php');
?>