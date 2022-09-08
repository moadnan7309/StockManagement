<?php ob_start(); 
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <style>
    .swal-text {
        color: #000 !important;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Login</span></div>
            <form action="" method="post">
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" name="email" onpaste="return false" class="form-control" required
                        placeholder="Email">
                </div>

                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" class="form-control" required placeholder="Password" value="<?php echo $_COOKIE['password']; ?>">
                </div>
                <div class="row button">
                    <input type="submit" value="Login">
                </div>
            </form>
        

        </div>
    </div>

</body>

</html>
<?php
if($_POST)
{
    $email=htmlspecialchars($_POST['email']);
    $password=htmlspecialchars(md5($_POST['password']));
    $p = $_POST['password'];
    setcookie("email",$email);
    setcookie("password",$p);
    $check_email=filter_var($email,FILTER_VALIDATE_EMAIL);
        if($check_email)
       {
         $c=mysqli_connect("localhost","root","","stock");
         $q=mysqli_query($c,"select * from users where email='$email' and password='$password'");
         $count=mysqli_num_rows($q);
         if($count==0)
          {
            echo "Faild";
          }
         else
          {
            session_start();
            $_SESSION['mysession']=$email;
            header("location:profile.php");
          }
        }
}
?>