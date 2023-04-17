<?php
include('constants.php')?>
<head><link rel="stylesheet" type="text/css" href="category.css"> </head>
<div class="main-content"> 
    <div class="wrapper">
        <h1>Add Category</h1>


        
        <?php 
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        
        ?>
        
        <form action="" method="POST">
        <table class="tbl-30">
            <tr>
                <td>Product ID: </td>
                <td>
                    <input type="text" name="product_id" placeholder="Product ID">
                </td>
            </tr>

            <tr>
                <td>Name: </td>
                <td>
                    <input type="text" name="name" placeholder="Product Name">
                </td>
            </tr>

            <tr>
                <td>Category: </td>
                <td>
                    <input type="text" name="category" placeholder="Product Category">
                </td>
            </tr>

            <tr>
                <td>Price: </td>
                <td>
                    <input type="text" name="price" placeholder="Product Price">
                </td>
            </tr>

            <tr>
            <td>In Stock: </td>
            <td>
                <label for="in_stock_yes">
                    <input type="radio" name="in_stock" id="in_stock_yes" value="1" checked> Yes
                </label>
                <label for="in_stock_no">
                    <input type="radio" name="in_stock" id="in_stock_no" value="0"> No
                </label>
            </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Product" class="btn-secondary">
                </td>
            </tr>
        </table>
        </form>
        <?php

            if (isset($_POST['submit'])) {
                // Get the form data
                $product_id = $_POST['product_id'];
                $name = $_POST['name'];
                $category = $_POST['category'];
                $price = $_POST['price'];
                $in_stock = $_POST['in_stock'];

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
            
                // SQL query to insert the new product into "products" table
                $sql = "INSERT INTO products (product_id, name, category, price, in_stock) VALUES ('$product_id', '$name', '$category', '$price', '$in_stock')";
            
                // Execute the query
                if (mysqli_query($conn, $sql)) {
                    echo "Product added successfully!";
                    header('location:'.SITEURL.'category.php');
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    header('location:'.SITEURL.'category.php');
                }
            
                // Close the database connection
                mysqli_close($conn);
            }


            

        ?>



    </div>
</div>