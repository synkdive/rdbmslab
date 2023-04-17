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
  <link rel="stylesheet" href="sales.css" />
  <script src="app.js"></script>
  <script type="text/javascript" src="app.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>

<body>
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
        <a href="dash.php" class="nav-links"><i class="fa-solid fa-house"></i> home</a>
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
  <br> <br> <br>
  <!-- header -->
  <header class="header">
    <div class="banner">
      <h2>Sale Analytics</h2>
    </div>

  </header>
  <!-- End of header -->


  <canvas id="salesChart"></canvas>

  <?php
  $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  // Query to calculate analytics for best-selling product
  $query1 = "SELECT product_id, SUM(order_qty) as total_qty, SUM(total) as total_sales 
            FROM orders 
            GROUP BY product_id 
            ORDER BY total_qty DESC 
            LIMIT 1";

  $result1 = $conn->query($query1);

  // Check if query was successful
  if ($result1) {
    // Fetch the row
    $row = $result1->fetch_assoc();

    // Extract the attributes
    $product_id = $row['product_id'];
    $total_qty = $row['total_qty'];
    $total_sales = $row['total_sales'];

    $product_query = "SELECT product_id, name, category, price, in_stock 
                      FROM products 
                      WHERE product_id = '$product_id'";
    $product_result = $conn->query($product_query);


    // Output the analytics
    if ($product_result) {
      // Fetch the product details
      $product_row = $product_result->fetch_assoc();

      // Extract the attributes
      $product_name = $product_row['name'];
      $product_category = $product_row['category'];
      $product_price = $product_row['price'];
      $product_in_stock = $product_row['in_stock'];

      // Output the product details
      echo "Best-selling Product ID: " . $product_id . "<br>";
      echo "Product Name: " . $product_name . "<br>";
      echo "Product Category: " . $product_category . "<br>";
      echo "Product Price: " . $product_price . "<br>";
      echo "Product In Stock: " . $product_in_stock . "<br>";
      echo "Total Quantity Sold: " . $total_qty . "<br>";
      echo "Total Sales: " . $total_sales . "<br>";
    } else {
      echo "Failed to retrieve product details: " . $mysqli->error;
    }

    // Close product query result
    $product_result->close();
  } else {
    echo "Failed to retrieve analytics: " . $conn->error;
  }
  $query2 = "SELECT sale_date, sale_qty, sale_total, product_id FROM sales";
  $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));

  // Prepare arrays to store data
  $labels = array();
  $salesQuantityData = array();
  $salesTotalData = array();

  // Loop through the fetched data and populate the arrays

  while ($row = mysqli_fetch_assoc($result2)) {
    // Modify the x-axis labels to MM DD format
    $label = date("F d", strtotime($row['sale_date'])); // Updated this line
    $labels[] = $label;
    $salesQuantityData[] = $row['sale_qty'];
    $salesTotalData[] = $row['sale_total'];
  }


  // Create an array for sales data
  $salesData = array(
    'labels' => $labels,
    'datasets' => array(
      array(
        'label' => 'Sales Quantity',
        'data' => $salesQuantityData,
        'backgroundColor' => 'rgba(63, 81, 181, 0.5)' // Bar color
      ),
      array(
        'label' => 'Sales Total',
        'data' => $salesTotalData,
        'backgroundColor' => 'rgba(244, 67, 54, 0.5)' // Bar color
      )
    )
  );

  // Convert the sales data array to JSON
  $salesDataJson = json_encode($salesData);


  ?>
  </div>

  <!-- Content for each tab goes here -->
  </div>
  </div>
  </div>


</body>

</html>

<script>
  // Render the chart
  var salesChart = new Chart(document.getElementById('salesChart'), {
    type: 'bar', // Chart type
    data: <?php echo $salesDataJson; ?>, // Pass the sales data as JSON
    options: {
      responsive: true,
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Sale Analytics'
      },
      scales: {
        x: {
          beginAtZero: true
        },
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>