<?php
include 'constants.php'; // Update with the correct file path
// Including constants.php

?>
<?php
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve data from the "admins" table
$sql = "SELECT admin_id, username, password FROM admins";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admins Data</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h1>Admins Data</h1>
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
﻿

    <div class="table-container"> 
    <table>
        <tr>
            <th>Admin ID</th>
            <th>Username</th>
            <th>Password</th>
        </tr>
        <?php
        // Loop through the query result and display data in table rows
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["admin_id"] . "</td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["password"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No data found</td></tr>";
        }
        ?>
    </table>
    </div>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
