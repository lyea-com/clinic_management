<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $conn->real_escape_string($_POST['user_id']);
    $name = $conn->real_escape_string($_POST['name']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    $date = $conn->real_escape_string($_POST['date']);
    $medical_history = $conn->real_escape_string($_POST['medical_history']);


    $sql = "UPDATE register SET name='$name', gender='$gender', phone='$phone', email='$email', date='$date', medical_history='$medical_history' WHERE user_id='$user_id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Patient record updated successfully'); window.location.href = 'manage_record.php';</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "'); window.location.href = 'manage_record.php';</script>";
    }

    $conn->close();
}
?>
