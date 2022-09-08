<?php
include "header.php";
$id=$_GET['id'];
$c=mysqli_connect("localhost","root","","stock");
$q=mysqli_query($c,"select * from categories where id='$id'");
?>
<form action="" method="post">

<?php
while($k=mysqli_fetch_array($q))
{
    ?>
    <level>Name:</level>
    <input type="text" name="name" value="<?php echo $k['name']; ?>" required />
    <br /> <br />
    
    <input type="submit" name="submit" value="Update" />

<?php
}
?>

</form>
<?php
if($_POST)
{
    $name=$_POST['name'];
    $c=mysqli_connect("localhost","root","","stock");
    $q=mysqli_query($c,"update categories set name='$name' where id='$id'");
    header("location:Manage_category.php");
}
include "footer.php";
?>