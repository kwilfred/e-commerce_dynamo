<?php include('menu.php');?>
    <div class="container">
        <h2>Change Password</h2>
        <div class="wrapper">
            <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }?>
            <form action="" method="post"> 
                <table class="tbl-30">
                <tr>
                        <td>Current Password:</td>
                        <td><input type="password" name="currentpassword" placeholder="Enter Current Password" required="required" minLength="8" maxLength="8"></td>
                    </tr>
                    <tr>
                        <td>New Password:</td>
                        <td><input type="password" name="newpassword" placeholder="Enter New Password" required="required" minLength="8" maxLength="8"></td>
                    </tr>
                    <tr>
                        <td>Confirm Password:</td>
                        <td><input type="password" name="confirmpassword" placeholder="Confirm New Password" required="required" minLength="8" maxLength="8"></td>
                    </tr>
                    <tr>
                       <td> <input type="hidden" name="id" value="<?php echo $id;?>"></td>
                    <td><a href=""><button type="submit" name="submit" id="cpassword">Change Password</button></a></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <?php
    //Get user input
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $current_password =md5($_POST['currentpassword']);
        $new_password =md5($_POST['newpassword']);
        $confirm_password =md5($_POST['confirmpassword']);

        //Querry to select id $ password
        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
        //excecute Querry
        $res = mysqli_query($con,$sql);
        if($res){
           $count = mysqli_num_rows($res);
           if($count == 1){
                if($new_password == $confirm_password){
                    $sql = "UPDATE `tbl_admin` SET password='$new_password'
                    WHERE id=$id";
                    $res = mysqli_query($con,$sql);
                    if($res){
                        echo "<script>
                        alert('Password Updated Successfully!');
                        window.location = 'index.php';
                        </script>";
                        $_SESSION['password_update']="<div class='success'>Password Updated Successfully!</div>";
                    }else{
                        echo "<script>
                        alert('Failed to Update Password, Try Again!');
                        window.location = 'index.php';
                        </script>";
                    }
                }else{
                    echo "<script>
                    alert('The New Passwords Do Not Match, Try Again!');
                    </script>";
                }
           }else{
                header('location:'.'index.php');
                $_SESSION['inexistent_user']="<div class='error'>User Not Found!</div>";
                die();
            }
        }
    }
    ?>
<?php include('footer.php');?>