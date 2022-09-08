<?php
include "header.php";
?>
<div class="container" style=margin-top:2% >
<div class="rows">
<h1>Add Product</h1>
<form action="" method="post" enctype=multipart/form-data>
<level>Name</level>
<input type="text" name="name" required/><br><br>
<level>Category</level>
<input type="text" name="category" required/><br><br>
<level>Price</level>
<input type="text" name="price" required/><br><br>
<level>Description</level>
<input type="text" name="description" required/><br><br>
<level>Uploads</level>
<input type="file" name="file" required/><br><br>
<input type="submit" name="submit" class= "btn btn-primary" />
<input type="reset" name="reset" class= "btn btn-primary"/>
</form>
</div>
</div>
<?php
if($_POST)
{
    $name=$_POST['name'];
    $category=$_POST['category'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $prm=$_FILES['file']['name'];
    $tmp=$_FILES['file']['tmp_name'];
    $folder="uploads/";
    $merge=$folder.$prm;
    move_uploaded_file($tmp,$merge);
    echo "uploaded";
    $check_name=preg_match("/^[a-zA-Z]{3,30}$/",$name);
    if($check_name )
    {
        $c=mysqli_connect("localhost","root","","stock");
        if(mysqli_query($c,"insert into products(id,category,name,price,description,file) values('','$category','$name','$price','$description','$merge')"))
        {
            echo "saved";
        }
        else
        {
            mysqli_error($c);
        }
        
    }
    else
    {
        echo "invalid";
    }
}
include "footer.php";
?>