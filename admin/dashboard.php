<?php
include 'constants.php'; // Update with the correct file path
// Including constants.php

?>

<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>

  <?php
  if (isset($_SESSION['login'])) {
    echo $_SESSION['login'];
    unset($_SESSION['login']);
  }

  ?>
  <link rel="stylesheet" href="styles/dash.css">
  <link rel="stylesheet" href="Assets/fontawesome-free-6.2.1-web/css/all.css" />
</head>

<body>
  <?php
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Query to retrieve data from the "admins" table
  $sql1 = "SELECT count(admin_id) as admin_no FROM admins";
  $result1 = $conn->query($sql1);

  // Query to retrieve data from the "admins" table
  $sql2 = "SELECT count(product_id) as product_no FROM products";
  $result2 = $conn->query($sql2);

  // Query to retrieve data from the "admins" table
  $sql3 = "SELECT count(DISTINCT category) as category_no FROM products";
  $result3 = $conn->query($sql3);

  ?>




  <!-- navbar -->
  <!-- nav items -->
  <nav class="navbar" id="navbar">
    <div class="navbar-header">
      <span class="close-btn" id="nav-close">
        <i class="fa-solid fa-xmark"></i>
      </span>
    </div>

    <ul class="nav-items">
      <li>
        <a href="#" class="nav-links"><i class="fa-solid fa-house"></i> home</a>
      </li>
      <li>
        <a href="#" class="nav-links"><i class="fa-solid fa-user"></i> admin</a>
      </li>
      <li>
        <a href="#" class="nav-links"><i class="fa-solid fa-tags"></i> category</a>
      </li>
      <li>
        <a href="#" class="nav-links"><i class="fa-solid fa-burger"></i> food</a>
      </li>
      <li>
        <a href="sales.php" class="nav-links"><i class="fa-solid fa-chart-line"></i> sales</a>
      </li>
      <li>
        <a href="logout.php" class="nav-links"><i class="fa-solid fa-arrow-right-from-bracket"></i> logout</a>
      </li>
    </ul>
  </nav>


  <!-- nav button -->
  <span class="nav-btn" id="nav-btn">
    <i class="fa-solid fa-bars"></i>
  </span>



  <!-- header -->
  <header class="header">
    <div class="banner">
      <h2>DASHBOARD</h2>
    </div>

  </header>


  <!-- End of header -->

  <span class="option">Admins <br><br><br><br> <?php if ($result1) {
                                                  $row = $result1->fetch_assoc();
                                                  echo $row['admin_no'];
                                                } ?></span>
  <span class="option">Products <br><br><br><br><?php if ($result2) {
                                                  $row = $result2->fetch_assoc();
                                                  echo $row['product_no'];
                                                } ?></span>
  <span class="option">Categories <br><br><br><br> <?php if ($result3) {
                                                      $row = $result3->fetch_assoc();
                                                      echo $row['category_no'];
                                                    } ?></span>




  <!-- End of options section -->


  <span class="icons">
    <i class="fa-solid fa-burger-fries"></i>
  </span>






  <!-- <script src="app.js"></script> -->
  <script type="text/javascript" src="styles/app.js"></script>
</body>

</html>