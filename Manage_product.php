<?php
include "header.php";
?>
<h1>Manage Product</h1>
<?php
$c=mysqli_connect("localhost","root","","stock");
$q=mysqli_query($c, "select * from products");
echo "<table border=5 cellpadding=5>";
echo "<th>";
echo "<tr>";
echo "<th>Category </th>";
echo "<th>Name</th>";
echo "<th>Price </th>";
echo "<th>Description</th>";
echo "<th>Uploads</th>";
echo "<th>Action</th>";
echo "<th>Action</th>";
echo "</tr>";
echo "<th>";
while($k=mysqli_fetch_array($q))
{
    echo "<tr>";
    echo "<td>".$k['category']."</td>";
    echo "<td>".$k['name']."</td>";
    echo "<td>".$k['price']."</td>";
    echo "<td>".$k['description']."</td>";
    
    ?>
    <td>
    <img src="<?php echo $k['file']?>" width="50px;"></img>
    </td>
    <td>
    <a href="delete1.php?id=<?php echo $k['id']?>">Delete</a>
    </td>
    <td>
    <a href="edit1.php?id=<?php echo $k['id']?>">Edit</a>
    </td>
    <?php
    echo "</tr>";

}
echo "</table>";
include "footer.php";
?>
