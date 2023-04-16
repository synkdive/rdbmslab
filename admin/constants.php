<?php
    
   /* define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'fastfood_inventory');
    $conn=mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
    $db_select=mysqli_select_db($conn, 'fastfood_inventory') or die(mysqli_error());*/

    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', ''); // Replace with your actual MySQL password
    define('DB_NAME', 'fastfood_inventory');
    define('SITEURL', 'http://localhost/fastfood_inventory/admin/');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_connect_error());
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));


?>