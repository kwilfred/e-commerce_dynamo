<?php 
include('menu.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM `tbl_order` WHERE id=$id";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res);
    if($count == 1){
        $row = mysqli_fetch_assoc($res);
        $id = $row['id'];
        $item = $row['food'];
        $price = $row['price'];
        $qty = $row['qty'];
        $tol = $row['total'];
        $status = $row['status'];
        $name= $row['c_name'];
        $contact = $row['c_contact'];
        $email = $row['c_email'];
        $address = $row['c_address'];
    }else{
        header('location:'.'manageorder.php');
        die();
    }

}
?>

<div class="main-content">
    <div class="cont">
        <h1>Update Order</h1>
        <form action="" method="post">
            <table>
                <tr>
                    <td><b><?php echo $item;?></b></td>
                </tr>
                <tr>
                    <td><b><?php echo 'Ksh.'. $price;?></b></td>
                </tr>
                <tr>
                    <td>Quantity: </td>
                    <td><input type="number" name="qty" value="<?php echo $qty?>"></td>
                </tr>
                <tr>
                    <td>
                        Status: 
                    </td>
                    <td>
                        <select name="status">
                            <option <?php if($status =="ordered"){ echo "selected";}?>  value="ordered">Ordered</option>
                            <option <?php if($status =="shipping"){ echo "selected";}?> value="shipping">Shipping</option>
                            <option <?php if($status =="delivered"){ echo "selected";}?> value= "delivered">Delivered</option>
                            <option <?php if($status =="cancelled"){ echo "selected";}?> value="canclled">Cancelled</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <button type="submit" name="submit">Update Order</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php 

if(isset($_POST['submit'])){

    $id = $_POST['id'];
    $qty = $_POST['qty'];
    $tol = $price * $qty;
    $status = $_POST['status'];

    $sql = "UPDATE `tbl_order` SET 
            qty = $qty,
            total = $tol,
            status = '$status' 
            WHERE id  = $id
    ";
    $res = mysqli_query($con, $sql);
    if($res){
        echo "<script>
        alert ('Order Updated Successfully!');
        window.location = 'manageorder.php';
        </script>";
    }else{
        header('location:'.'manageorder.php');
        die();
    }


}

include('footer.php')
?>