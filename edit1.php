<?php
$id=$_GET['id'];
$c=mysqli_connect("localhost","root","","stock");
$q=mysqli_query($c,"select * from products where id='$id'");
?>
<form action="" method="post">

<?php
while($k=mysqli_fetch_array($q))
{
    ?>
    <level>category</level>
    <input type="text" name="category" value="<?php echo $k['category']; ?>" required />
    <br /> <br />
    
    <level>Name</level>
    <input type="text" name="name" value="<?php echo $k['name']; ?>" required />
    <br /> <br />
    <level>Price</level>
    <input type="text" name="price" value="<?php echo $k['price']; ?>" required />
    <br /> <br />
    <level>Description</level>
    <input type="text" name="description" value="<?php echo $k['description']; ?>" required />
    <br /> <br />
    
    <input type="submit" name="submit" value="Update" />

<?php
}
?>

</form>
<?php
if($_POST)
{
    $category=$_POST['category'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $c=mysqli_connect("localhost","root","","stock");
    $q=mysqli_query($c,"update products set category='$category',name='$name', price=$price,description='$description' where id='$id'");
    header("location:Manage_product.php");
}
?>