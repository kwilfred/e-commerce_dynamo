<?php
include("../config/connect.php");
    if(isset($_GET['id'])&& isset($_GET['imageName'])){
        $id = $_GET['id'];
        $image = $_GET['imageName'];

        if($image !=""){
            $path = "../images/stock/".$image;
            $remove = unlink($path);

            if(!$remove){
                $_SESSION['delete'] = "<div class='error'>Faile To Remove the Image</div>";
                header('location:'.'stock.php');
                die();
            }
        }

        $sql = "DELETE  FROM `tbl_stock` WHERE id=$id";
        $res = mysqli_query($con, $sql);

        if($res){
            $_SESSION['delete'] = "<div class='success'>Stock Deleted Successfully</div>";
            header('location:'.'stock.php');
        }else{
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Stock</div>";
            header('location:'.'stock.php');
            die();
        }
    }else{
        header('location:'.'stock.php');
        die();
    }
?>