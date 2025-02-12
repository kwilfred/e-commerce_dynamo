<?php
include('../config/connect.php');

$id = $_GET['id'];

$sql = "DELETE FROM tbl_admin WHERE id = $id";

$res = mysqli_query($con, $sql);
if($res){
    header('location:'.'index.php');
    $_SESSION['delete'] = "<div class='success'>Admin Deleleted Successfully!</div>";
}else{
    header('location:'.'index.php');
    $_SESSION['delete'] = "<div class='error'>Failed to delete admin!</div>";
    die();
}

?>