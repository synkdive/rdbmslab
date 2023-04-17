<?php
include('constants.php');
?>

<head>
    <link rel="stylesheet" type="text/css" href="category.css">
</head>
<div class="main-content">
    <div class="wrapper">
        <h1>Delete Category</h1>

        <?php
        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Category ID: </td>
                    <td>
                        <input type="text" name="category_id" placeholder="Category ID">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Delete Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php

        if (isset($_POST['submit'])) {
            // Get the form data
            $category_id = $_POST['category_id'];

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // SQL query to delete the category from "categories" table
            $sql = "DELETE FROM categories WHERE category_id = '$category_id'";

            // Execute the query
            if (mysqli_query($conn, $sql)) {
                echo "Category deleted successfully!";
                header('location:' . SITEURL . 'category.php');
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                header('location:' . SITEURL . 'category.php');
            }

            // Close the database connection
            mysqli_close($conn);
        }
        ?>

    </div>
</div>
