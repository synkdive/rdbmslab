<?php
include 'constants.php'; // Update with the correct file path
// Including constants.php

?>




<!DOCTYPE html>
<html>
<head>
    <title>Category Table</title>
    
    <link rel="stylesheet" href="category.css"> 
</head>
<body>
<div class="heading">
            <h1>Category</h1>
    </div>

    <div class="main-content">
    
        
        <div class="table-container">
        <table border="1">
            <tr>
                <th>Category</th>
                <th>Product Count</th>
            </tr>
            <?php
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Fetch category names and product count from the database
            $sql = "SELECT category, COUNT(*) as product_count FROM products GROUP BY category";
            $result = mysqli_query($conn, $sql);

            // Display the results in a table
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['category'] . "</td>";
                echo "<td>" . $row['product_count'] . "</td>";
                echo "</tr>";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </table>
        </div>
        <br>
        <div class="button-container">
        <button class="btn-secondary" onclick="location.href='add-category.php'">Add Category</button>
        <button class="btn-secondary" onclick="location.href='delete-category.php'">Delete Category</button>
        </div>
    </div>
</body>
</html>
