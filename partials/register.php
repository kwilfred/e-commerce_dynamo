<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include("../config/connect.php");?>
    <section id="login">
        <br>
    <h2 id='sign'>SIGN UP</h2>
        <form action="" enctype="multipart/form-data" method="post">
            <input class='element' type="text" name="full_name" placeholder="Full Name" required='required'><br>
            <input class='element' type="text" name="user_name" placeholder="username" required='required'><br>
            <input class='element' type="email" name="email" placeholder="Email"><br>
            <input class='element' type="tel" name="phone" placeholder="Phone" required='required'><br>
            <textarea name="address" placeholder="Address eg City, Estate, Town" cols="65" rows="3" required></textarea><br>
            <input class='element' name="photo" type="file" required='required'><br>
            <input class='element' name="password" type="password" placeholder="Enter password" required='required' minLength='8' maxLength='8'><br>
            <input class='element'name="c_password" type="password" placeholder="Confirm password" required='required' minLength='8' maxLength='8'><br>
            <a href="login.php?id=<?php $id?>"><button type="submit" name="submit" class="signup">submit</button><br></a>
            <p>Already have an account? <a href="signin.php">Sign In</a></p>
        </form>
    </section>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $full_name = $_POST['full_name'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $password = md5($_POST['password']);
    $c_password = md5($_POST['c_password']);
    $user =$_POST['user'];

    $sql="INSERT INTO `tbl_user` (full_name, user_name, email, phone, photo, password)
    values('$full_name', '$user_name','$email','$phone','$photo','$password')";

    $res = mysqli_query($con,$sql);

    if($res){
        if($password == $c_password){
            move_uploaded_file($tmp_name,"../uploads/$photo");
            echo "<script>
            alert('Data Inserted Succesfully!');
            window.location ='../admin/signin.php';
            </script>";
        }else{
            echo "<script>
            alert('Passwords do not Match, Try Again!');
            </script>";
        }
    }
}
?>
