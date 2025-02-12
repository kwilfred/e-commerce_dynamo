<?php
if(isset($_POST['submit'])){
    $userName =$_POST['userName'];
    $password=$_POST['password'];
    $user =$_POST['user'];

    $sql ="SELECT * FROM `tbl_user` WHERE id=$id and password='$password'";
    $res =mysqli_query($con, $sql);

    if($res){
        echo "You've Logged in successfully!";
    }else{
        echo "Login failed!";
    }
}

?>