<?php
# Database Connection
$condb = mysqli_connect("localhost", "root", "", "clinic");

# Check if connection is successful
if (!$condb) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
