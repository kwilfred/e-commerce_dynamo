<?php include("menu.php")?>
<div class="main-content">
    
<br><br>
    <div id="wrapper">
        <h1>Dashboard</h1>
        <br><br>
        <div class="col">
            <?php 
            $sql = "SELECT * FROM `tbl_category`";
            $res = mysqli_query($con, $sql);
            $row = mysqli_num_rows($res);
            ?>
            <h1><?php echo $row; ?></h1>
            Categories
        </div>
        <div class="col">
        <?php 
            $sql = "SELECT * FROM `tbl_stock`";
            $res = mysqli_query($con, $sql);
            $item = mysqli_num_rows($res);
            ?>
            <h1><?php echo $item; ?></h1>
            Items
        </div>
        <div class="col">
        <?php 
            $sql = "SELECT * FROM `tbl_order`";
            $res = mysqli_query($con, $sql);
            $row = mysqli_num_rows($res);
            ?>
            <h1><?php echo $row; ?></h1>
            Total Orders
        </div>
        <div class="col">
        <?php 
            $sql = "SELECT * FROM `tbl_order` WHERE status='delivered'";
            $res = mysqli_query($con, $sql);
            $row = mysqli_num_rows($res);
            ?>
            <h1><?php echo $row; ?></h1>
            Delivered Orders
        </div>
        <div class="col">
        <?php 
            $sql = "SELECT * FROM `tbl_order` WHERE status='shipping'";
            $res = mysqli_query($con, $sql);
            $row = mysqli_num_rows($res);
            ?>
            <h1><?php echo $row; ?></h1>
            Shipping Orders
        </div>
        <div class="col">
        <?php 
            $sql = "SELECT * FROM `tbl_order` WHERE status='Canclled'";
            $res = mysqli_query($con, $sql);
            $row = mysqli_num_rows($res);
            ?>
            <h1><?php echo $row; ?></h1>
            Cancelled Orders
        </div>
        <div class="col">
        <?php 
        // Aggregate function in SQL
            $sql = "SELECT SUM(total) AS Total FROM `tbl_order` WHERE status='Delivered'";
            $res = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($res);
            $total = $row['Total'];
            
            ?>
            <h1>Ksh.<?php echo $total; ?></h1>
            Revenue Generated
        </div>
    </div>
    <br><br>
    <div class="clearfix"></div>
</div>
<br><br>
<?php include("footer.php")?>