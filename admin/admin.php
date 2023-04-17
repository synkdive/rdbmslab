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
