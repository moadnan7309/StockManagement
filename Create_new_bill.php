<?php
include "header.php";
?>
<div class="container" style="margin-top:2%">
    <div class="row">
        <h1 style="align:center">Create new Bill</h1>
            <form action="" method="post">
            <label>Product Name:</label>
            <select name="product_name[]" id="">
            <option value=""></option>
            <option value="dell">Dell Laptop</option>
            <option value="hp">HP Laptop</option>
            <option value="asus">Asus Laptop</option>
            <option value="lenovo">Lenovo Laptop</option>
            <option value="redmi">Redmi Mobile</option>
            <option value="sumsung">Sumsung Mobile</option>
            </select>
            <label>Product Quantity:</label>
            <input type="text" name="quantity[]" />
            <label>Product price:</label>
            <input type="text" name="price[]" />
            <br /><br />
            <label>Product Name:</label>
            <select name="product_name[]" id="">
            <option value=""></option>
            <option value="dell">Dell Laptop</option>
            <option value="hp">HP Laptop</option>
            <option value="asus">Asus Laptop</option>
            <option value="lenovo">Lenovo Laptop</option>
            <option value="redmi">Redmi Mobile</option>
            <option value="sumsung">Sumsung Mobile</option>
            </select>
            <label>Product Quantity:</label>
            <input type="text" name="quantity[]" />
            <label>Product price:</label>
            <input type="text" name="price[]" />
            <br /><br />
            <label>Product Name:</label>
            <select name="product_name[]" id="">
            <option value=""></option>
            <option value="dell">Dell Laptop</option>
            <option value="hp">HP Laptop</option>
            <option value="asus">Asus Laptop</option>
            <option value="lenovo">Lenovo Laptop</option>
            <option value="redmi">Redmi Mobile</option>
            <option value="sumsung">Sumsung Mobile</option>
            </select>
            <label>Product Quantity:</label>
            <input type="text" name="quantity[]" />
            <label>Product price:</label>
            <input type="text" name="price[]" />
            <br /><br />
            <label>Product Name:</label>
            <select name="product_name[]" id="">
            <option value=""></option>
            <option value="dell">Dell Laptop</option>
            <option value="hp">HP Laptop</option>
            <option value="asus">Asus Laptop</option>
            <option value="lenovo">Lenovo Laptop</option>
            <option value="redmi">Redmi Mobile</option>
            <option value="sumsung">Sumsung Mobile</option>
            </select>
            <label>Product Quantity:</label>
            <input type="text" name="quantity[]" />
            <label>Product price:</label>
            <input type="text" name="price[]" />
            <br /><br />
            <label>Customer Name:</label>
            <input type="text" name="custmor_name" class="form-control" required />
            <br /><br />
            <label>Customer Mobile:</label>
            <input type="text" name="custmor_mobile" class="form-control" onkeypress="return event.charCode>=48 && event.charCode<=57" required />
            <br /><br />
            <label>Customer Address:</label>
            <textarea name="custmor_address" id="" class="form-control" cols="30" rows="2"></textarea>
            <br /><br />
            <label>Purchase Date</label>
            <input type="date" name="date" class="form-control">
            <br />
            <input type="submit" name="submit" value="Add" class="btn btn-primary" />
</form>
</div>
</div>
<?php
if($_POST)
{
    $product_name   =   $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price =    $_POST['price'];
    $custmor_name  =   $_POST['custmor_name'];
    $custmor_mobile =  $_POST['custmor_mobile'];
    $custmor_address=  $_POST['custmor_address'];
    $date = $_POST['date'];
    $check_custmor_name    =   preg_match("/^[a-zA-Z]{3,30}$/",$custmor_name);
    $check_custmor_mobile  = preg_match("/^[0-9]{10}$/",$custmor_mobile);
    if($check_custmor_name && $check_custmor_mobile)
    {
        $c=mysqli_connect("localhost","root","","stock");

       $count = count($product_name);
       
       for($i=0;$i<$count;$i++)
       {
           
           mysqli_query($c,"INSERT into bills values('','$product_name[$i]', '$quantity[$i]', '$price[$i]', '$custmor_name','$custmor_mobile', '$custmor_address','$date')");
       }

       echo "Product has been Saved";
    }
    else
    {
        echo "Please valid data";
    }
}
?>

<?php
include "footer.php";
?>