<?php
include 'constants.php'; // Update with the correct file path
// Including constants.php

?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  
        <?php 
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        
        ?>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    .sidebar {
      background-color: #d6e4f0; /* blue color */
      height: 100vh;
      padding-top: 20px;
    }
    .sidebar ul {
      list-style-type: none;
      padding: 0;
    }
    .sidebar ul li {
      padding: 10px;
      cursor: pointer;
      color: #3f51b5; /* purple color */
    }
    .sidebar ul li:hover {
      background-color: #c5d4e8; /* light blue color */
    }
    .content {
      padding: 20px;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2 sidebar">
        <ul>
          <li><i class="fas fa-home"></i> Home</li>
          <li><i class="fas fa-user"></i> Admin</li>
          <li><i class="fas fa-tags"></i> Category</li>
          <li><i class="fas fa-hamburger"></i> Food</li>
          <li><a href="sales.php"><i class="fas fa-chart-line"></i> Sales</a></li>
          <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
      </div>
      <div class="col-md-10 content">
        <h1>Dashboard</h1>
        <p>Inventory Management System for a fast food restaurant.</p>
        <div class="col-md-10 content">
        
</div>

        <!-- Content for each tab goes here -->
      </div>
    </div>
  </div>
</body>
</html>

