<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include("../config/connect.php");?>
    <section id="cont"><br><br>
        <h2 id="sign">LOGIN</h2><br>
        <?php 
        if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        };
        if(isset($_SESSION['flogin'])){
            echo $_SESSION['flogin'];
            unset($_SESSION['flogin']);
        };

        ?>
        <form action="" method="post">
            <label for="userName">User Name</label><br>
            <input class='element'name="userName" type="text" placeholder="Enter User Name" required='required'><br>
            <label for="password">Password</label><br>
            <input class='element' name="password" type="password" placeholder="Enter Password" required='required' minLength="8" maxLength="8"><br>
            <button class="signin" type="submit" name="submit">Submit</button><br>
            <p>Don't have an account? <a href="../partials/register.php">Sign Up</a></p>
        </form>
    </section>
    <?php
    if(isset($_POST['submit'])){
        $userName = $_POST['userName'];
        $password =md5($_POST['password']);
        $sql = "SELECT * FROM tbl_admin WHERE user_name='$userName' AND password='$password'";
        $res = mysqli_query($con,$sql);

        if($res){
        $count = mysqli_num_rows($res);
            if($count == 1){
                echo "<script>
                alert('Access Granted!');
                window.location ='index.php';
                </script>";
                $_SESSION['login']="<div class='success'>Login Successfull</div>";
                $_SESSION['user']= $userName;//To check whether user is logged in or not & logout will unset it
            }else{
                echo "<script>
                alert('Access Denied!');
                </script>";
                $_SESSION['login'] = "<div class='error'>Username or Passwords Do Not Match!</div>";
            }
        }else{
            echo "<script>
            alert('There Is No User Plese Create Your Account');
            window.location = 'index.php';
            </script>";
        }
                
    }
    ?>
</body>
</html>