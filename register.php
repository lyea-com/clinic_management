<?php include("header.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Patient Register</title>
    <style>
        .profile-container {
            text-align: center;
            padding: 20px;
        }
        form {
            display: inline-block;
            text-align: left;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: #f48fb1;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #f48fb1;
        }
    </style>
</head>
<body>
  <div class="profile-container">
    <h2>CLINIC MEDIC REGISTRATION</h2>
    <form method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" placeholder="Enter your name" required>

        <label for="gender">Gender:</label>
        <input type="text" name="gender" id="gender" placeholder="Male/Female" required>

        <label for="phone">Phone:</label>
        <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Enter your email" required>

        <label for="date">Date:</label>
        <input type="text" name="date" id="date" placeholder="Enter current visit date" required>

        <label for="medical_history">Medical History:</label>
        <input type="text" name="medical_history" id="medical_history" placeholder="Describe any medical history (optional)" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" required>

        <button type="submit">Register</button>
    </form>
    <p>Already registered? <a href="login.php">Login</a></p>
</div>
</body>
</html>


<?php
include('db.php'); // Ensure this includes the $condb connection variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and escape inputs
    $name = mysqli_real_escape_string($condb, $_POST['name']);
    $gender = mysqli_real_escape_string($condb, $_POST['gender']);
    $phone = mysqli_real_escape_string($condb, $_POST['phone']);
    $email = mysqli_real_escape_string($condb, $_POST['email']);
    $date = mysqli_real_escape_string($condb, $_POST['date']);
    $medical_history = mysqli_real_escape_string($condb, $_POST['medical_history']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insert into database
    $sql = "INSERT INTO register (name, gender, phone, email, date, medical_history, password) 
            VALUES ('$name', '$gender', '$phone', '$email', '$date', '$medical_history', '$password')";

    if (mysqli_query($condb, $sql)) {
        echo "<script>alert('Registration successful!'); window.location.href='login.php';</script>";
    } else {
        echo "Error: " . mysqli_error($condb);
    }
}
?>
 <?php include("footer.php"); ?>