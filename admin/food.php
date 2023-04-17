<?php
include 'constants.php'; // Update with the correct file path
// Including constants.php

?>

<!DOCTYPE html>
<html>
<head>
    <title>Food Products</title>

    <link rel="stylesheet" href="food.css">
   
</head>
<body>
<div class="heading">
    <h1>Food Products</h1>
</div>

<div class="main-content">

    <div class="table-container">
        <table border="1" class="product-table">
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>In Stock</th>
            </tr>
            <?php
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Fetch product details from the products table
            $sql_products = "SELECT product_id, name, category, price, in_stock FROM products";
            $result_products = mysqli_query($conn, $sql_products);

            // Display the product details in a table
            while ($row_products = mysqli_fetch_assoc($result_products)) {
                echo "<tr>";
                echo "<td>" . $row_products['product_id'] . "</td>";
                echo "<td>" . $row_products['name'] . "</td>";
                echo "<td>" . $row_products['category'] . "</td>";
                echo "<td>" . $row_products['price'] . "</td>";
                echo "<td>" . $row_products['in_stock'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <br>

    <div class="table-container">
        <table border="1" class="ingredient-table">
            <tr>
                <th>Ingredient ID</th>
                <th>Name</th>
                <th>Stock</th>
                <th>Cost Per Unit</th>
                <th>Supplier ID</th>
            </tr>
            <?php
            // Fetch ingredient details from the ingredients table
            $sql_ingredients = "SELECT ing_id, ing_name, stock, cost_per_unit, sup_id FROM ingredients";
            $result_ingredients = mysqli_query($conn, $sql_ingredients);

            // Display the ingredient details in a table
            while ($row_ingredients = mysqli_fetch_assoc($result_ingredients)) {
                echo "<tr>";
                echo "<td>" . $row_ingredients['ing_id'] . "</td>";
                echo "<td>" . $row_ingredients['ing_name'] . "</td>";
                echo "<td>" . $row_ingredients['stock'] . "</td>";
                echo "<td>" . $row_ingredients['cost_per_unit'] . "</td>";
                echo "<td>" . $row_ingredients['sup_id'] . "</td>";
                echo "</tr>";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </table>
    </div>

    <br>

</div>


    </body>
</html>