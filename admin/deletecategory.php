<?php
include("../config/connect.php");
if(isset($_GET['id']) && isset($_GET['image_name'])){
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //Remove image
    if($image_name !=""){
        $path = "../images/category/".$image_name;
        $remove = unlink($path);

        if(!$remove){
            $_SESSION['remove'] ="<div class='error'>Failed To Delete the Image!</div>";
            header('location:'.'categories.php');
            die();
        }
    }

    $sql ="DELETE FROM `tbl_category` WHERE id='$id'";
    $res = mysqli_query($con,$sql);

    if($res){
        $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully!</div>";
        header('location:'.'categories.php');
    }else{
        $_SESSION['delete'] = "<div class='error'>Failed To Delete Category!</div>";
        header('location:'.'categories.php');
}

}else{
    //Redirect to Category
    header('location:'.'categories.php');
}

?>