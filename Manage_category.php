<?php
include "header.php";
?>
<h1>Manage Category</h1>
<?php
$c=mysqli_connect("localhost","root","","stock");
$q=mysqli_query($c, "select * from categories");
echo "<table border=5 cellpadding=5>";
echo "<th>";
echo "<tr>";
echo "<th>Category Name</th>";
echo "<th>Category Photo</th>";
echo "<th>Action</th>";
echo "<th>Action</th>";
echo "</tr>";
echo "</th>";
while($k=mysqli_fetch_array($q))
{
    echo "<tr>";
    echo "<td>".$k['name']."</td>";
   
    ?>
    <td>
    <img src="<?php echo $k['file']?>" width="50px;"></img>
    </td>
    <td>
    <a href="delete.php?id=<?php echo $k['id']?>">Delete</a>
    </td>
    <td>
    <a href="edit.php?id=<?php echo $k['id']?>">Edit</a>
    </td>
    <?php
    echo "</tr>";

}
echo "</table>";
include "footer.php";
?>
