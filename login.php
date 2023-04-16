<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <h1>Inventory</h1>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="login" value="Login">
        </form>
    </div>
</body>
</html>

<?php
// Start session
session_start();

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    //sql query
    $sql="SELECT * FROM admins WHERE username='$username' AND password='$password'";

    $res=mysqli_query($conn, $sql);

    //count rows whether the user exists
    $count=mysqli_num_rows($res);

    if($count==1){
        //user exists
        $_SESSION['login']="<div class='success'>Login Successful. </div>"; // Add semicolon here
        header('location:'.SITEURL.'admin/');
    }
    else{
        //does not exist
        $_SESSION['login']="<div class='success'>Login failed. </div>"; // Add semicolon here
        header('location:'.SITEURL.'admin/login.php');
    }
}
?>
