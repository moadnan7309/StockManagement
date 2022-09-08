<?php
include "header.php";
?>
<div class="container" style="margin-top:2%">
<div class="row">
<h1>Filter Reports</h1>
<form action="" method="post">
<label>Customer Mobile:</label>
<input type="text" name="custmor_mobile" class="form-control" required />
<br />
<label>Date:</label>
<input type="date" name="date" class="form-control" required />
<br />
<input type="submit" value="Filter" class="btn btn-primary" />
</form>
</div>
</div>
<?php
if($_POST)
{
    $custmor_mobile=$_POST['custmor_mobile'];
    $date = $_POST['date'];
    $check_mobile=preg_match("/^[0-9]{10}$/",$custmor_mobile);
    if($check_mobile)
    {
        include "connection.php";
        $q=mysqli_query($c,"select * from bills where custmor_mobile='$custmor_mobile' and date='$date'");

        if(mysqli_num_rows($q)==0)
        {
            echo "<div class='alert alert-danger'>No Bills Found</div>";
        }
        else
        {
            ?>
                <table class="table">
                    <Tr>
                        <th>Bill No.</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    <?php
                        $total = 0;
                        while($k = mysqli_fetch_array($q))
                        {
                            $total = $total + $k['price'];
                            $name = $k['custmor_name'];
                            $mobile = $k['custmor_mobile'];
                            $address = $k['custmor_address'];
                            ?>
                            <Tr>
                                <td><?php echo $k['id']; ?></td>
                                <td><?php echo $k['product_name']; ?></td>
                                <td><?php echo $k['quantity']; ?></td>
                                <td><?php echo $k['price']; ?></td>
                            </tr>
                            <?php
                        }
                    ?>
                    <tr>
                        <td colspan="3">
                            <strong>Total Price = <?php echo number_format($total); ?> INR</strong>
                        </td>
                    </tr>
                </table>
                <p style="margin-left:5%; font-weight:bold">
                    Customer Name : <?php echo $name; ?>
                    <br><br>
                    Customer Mobile No. : <?php echo $mobile; ?>
                    <Br><Br>
                    Customer Address : <?php echo $address; ?>
                </p>
                <br>
                <center>
                        <a href="#" onclick="window.print()" class="btn btn-secondary">Print</a>
                </center>
            <?php
        }
        
    }
    else
    {
        echo "Please valid Mobile Number";
    }
}
include "footer.php";
?>