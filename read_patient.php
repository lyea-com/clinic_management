<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM register";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>Gender</th><th>Phone</th><th>Email</th><th>Date</th><th>Medical History</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["user_id"]."</td><td>".$row["name"]."</td><td>".$row["gender"]."</td><td>".$row["phone"]."</td><td>".$row["email"]."</td><td>".$row["date"]."</td><td>".$row["medical_history"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}


$conn->close();
?>
