<?php include('menu.php')?>

    <h2 class="add-admin">Add Admin</h2><br>
    <?php
    if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
    ?>
    <form action="" method="post">

        <table class="tbl-30">
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="fName" placeholder="Enter your Full Name" required='required'></td>
            </tr>
            <tr>
                <td>User Name:</td>
                <td><input type="text" name="uName" placeholder="Enter your User Name"required='required'></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" minLength="8" maxLength="8" placeholder="Enter Password"required='required'></td>
            </tr>
            <tr>
                <td colspan='2'>
                    <button type="submit" name='submit' id="add-admin" value="Add Admin">Add Admin</button>
                </td>
            </tr>
        </table>

    </form>

    <?php include('footer.php')?>


    <?php
    // include('actions/connect.php');
    if(isset($_POST['submit'])){
        //get data from form
        $fName = $_POST['fName'];
        $uName = $_POST['uName'];
        $password = md5($_POST['password']);

        //sQl query to save data into DB

        $sql = "INSERT INTO `tbl_admin`(full_name, user_name, password)
        values('$fName', '$uName','$password')";

        $result = mysqli_query($con,$sql);
        if ($result) {
            echo '<script>
            alert("Data inserted Succesfully!");
            window.location = "index.php";
            </script>';
            $_SESSION['add'] = "<div class='success'>Admin Added Succesfully!</div>";
        }else{
            echo '<script>
            alert("Unable to add Admin,Try Again Later!");
            window.location = "index.php";
            </script>';
        }
    }
?>