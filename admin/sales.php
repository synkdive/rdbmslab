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
    
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    .sidebar {
      background-color: #d6e4f0; /* blue color */
      min-height: 100vh;
      padding: 20px;
    
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
          <li><a href="dash.php"><i class="fas fa-home"></i> Home</a></li>
          <li><a href="admin.php"><i class="fas fa-user"></i> Admin</a></li>
          <li><a href="category.php"><i class="fas fa-tags"></i> Category</a></li>
          <li><a href="food.php"><i class="fas fa-hamburger"></i> Food</a></li>
          <li><i class="fas fa-chart-line"></i> Sales</li>
          <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
      </div>
      <div class="col-md-10 content">
        <h1>Sales Analytics</h1>
        <p> </p>
        <div class="col-md-10 content">
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
      text: 'Sales Analytics'
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