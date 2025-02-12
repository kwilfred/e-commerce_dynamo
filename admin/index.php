<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admin - page</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include('menu.php') ?>

    <div class="main-content"> 
        <div class="cont">
            <h1>Manage Admin</h1><br>

            <?php
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if (isset($_SESSION['delete'])){
                echo ($_SESSION['delete']);
                unset($_SESSION['delete']);
            }
            if (isset($_SESSION['update'])){
                echo ($_SESSION['update']);
                unset($_SESSION['update']);
            }
            if (isset($_SESSION['inexistent_user'])){
                echo ($_SESSION['inexistent_user']);
                unset($_SESSION['inexistent_user']);
            }
            if (isset($_SESSION['password_update'])){
                echo ($_SESSION['password_update']);
                unset($_SESSION['password_update']);
            }
            ?>
            <br>

            <a href="./addadmin.php"><button class="btn-admin" a>Add Admin</button><br></a>

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>full Name</th>
                    <th>User Name</th>
                    <th>Actions</th>
                </tr>

                <tr>
                    <?php
                    $sql = "SELECT * FROM tbl_admin";
                    $res = mysqli_query($con, $sql);

                    if($res){
                        $count = mysqli_num_rows($res);
                        $sn = 1;

                        if($count > 0){
                            while ($rows = mysqli_fetch_assoc($res)) {
                                $id = $rows['id'];
                                $fName = $rows['full_name'];
                                $uName = $rows['user_name'];
                    ?>
                </tr>
                <tr>
                    <td><?php echo $sn++ ?> </td>
                    <td><?php echo $fName ?></td>
                    <td><?php echo $uName ?></td>
                    <td>
                        <a href="changepassword.php?id=<?php echo $id;?>"><button type="submit" id='cpassword' class="cpass">Change Password</button></a>
                        <a href="updateadmin.php?id=<?php echo $id;?>"><button type="submit" id='update' class="success">Update Admin</button></a>
                        <a href="deleteadmin.php?id=<?php echo $id;?>"><button type="submit"id='delete' class="error">Delete Admin</button></a>
                    </td>
                </tr>
                                <?php
                            }
                        }else{

                        }
                    }
                    ?>
            </table>
        </div>
    </div>
        
    <?php include('footer.php') ?>
</body>
</html>