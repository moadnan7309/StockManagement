<?php
session_start();
$e1=$_SESSION['mysession'];
session_destroy();
header("location:login.php");
?>