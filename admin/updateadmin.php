
    <?php include('menu.php');?>
    <?php 
        $id = $_GET['id'];

        $sql = "SELECT * FROM `tbl_admin` WHERE id = $id";
        $res =  mysqli_query($con, $sql);

        if($res){
            $count = mysqli_num_rows($res);
            if($count == 1){
                // Get details
                $row = mysqli_fetch_assoc($res);
                $full_name = $row['full_name'];
                $user_name = $row['user_name'];

            }else{
                //Redirect to Manage admin Page
                header('location:'.'index.php');
                die();
            }
        }

    ?>

        <div class="wrapper"><br>
            <h1>Update Admin</h1>
            <form action="" method="post">
                <table table-30>
                    <tr>
                        <td>Full Name:</td>
                        <td><input type="text" name="fName" value ="<?php echo $full_name;?>"></td>
                    </tr>
                    <tr>
                        <td>User Name:</td>
                        <td><input type="text" name="uName" value ="<?php echo $user_name;?>"></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $id?>">
                            <button type="submit" name='submit'>Update Admin</button></td>
                    </tr>
                </table>
            </form>
        </div>
        <?php
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $fName = $_POST['fName'];
                $uName = $_POST['uName'];

                $sql ="UPDATE `tbl_admin` SET 
                full_name = '$fName',
                user_name= '$uName' 
                WHERE id = '$id'";

                $res = mysqli_query($con, $sql);
                if($res){
                    header('location:'.'index.php');
                    $_SESSION['update'] = "<div class='success'>Admin Updated Successfully!</div>";
                }else{
                    $_SESSION['update'] = "<div class='error'>Admin Failed to Updated!</div>";
                    header('location:'.'index.php');
                }
            }
            ?>

    <?php include('footer.php');?>