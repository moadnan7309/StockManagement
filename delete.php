<?php
$id=$_GET['id'];
$c=mysqli_connect("localhost","root","","stock");
$q=mysqli_query($c,"delete  from categories where id='$id'");
header("location:Manage_category.php");
?>