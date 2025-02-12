<?php include('menu.php')?>
    <div class="main-content">
        <div class="cont">
            <h1>Manage Order</h1><br>
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Order-Date</th>
                    <th>Status</th>
                    <th>Customer Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <?php
                    $sql = "SELECT * FROM `tbl_order`";
                    $res = mysqli_query($con,$sql);
                    $count = mysqli_num_rows($res);
                    if($count > 0){
                        $num = 1;
                        while($row = mysqli_fetch_assoc($res)){
                            $id = $row['id'];
                            $item = $row['food'];
                            $price = $row['price'];
                            $qty = $row['qty'];
                            $tot = $row['total'];
                            $date = $row['order_date'];
                            $status = $row['status'];
                            $cName = $row['c_name'];
                            $cCont = $row['c_contact'];
                            $cEmail = $row['c_email'];
                            $cAddress = $row['c_address'];
                            ?>
                            </tr>  
                            <tr>
                                <td><?php echo $num++;?></td>
                                <td><?php echo $item;?></td>
                                <td><?php echo $price;?></td>
                                <td><?php echo $qty;?></td>
                                <td><?php echo $tot;?></td>
                                <td><?php echo $date;?></td>
                                <td><?php echo $status;?></td>
                                <td><?php echo $cName;?></td>
                                <td><?php echo $cCont;?></td>
                                <td><?php echo $cEmail;?></td>
                                <td><?php echo $cAddress;?></td>
                                <td><a href="updateorder.php?id=<?php echo $id ?>"><button type="submit" name="update">Update Order</button></a></td>
                            </tr>
                            <?php
                        }
                    }else{
                        echo "<tr><td> No Order Currently Available</td></tr>";
                    }
                    ?> 
            </table>
        </div>
    </div>
<?php include('footer.php')?>