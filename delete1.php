<?php
$id=$_GET['id'];
$c=mysqli_connect("localhost","root","","stock");
$q=mysqli_query($c,"delete  from products where id='$id'");
header("location:Manage_product.php");
?>