<?php include("header.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Patient Login</title>
    <style>
        .login-container {
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
<div class="login-container">
    <h2>CLINIC MEDIC LOGIN</h2>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" placeholder="Enter your name" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" required>

        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register</a></p>
</div>
</body>
</html>


<?php
include('db.php'); // Ensure this includes the $condb connection variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form inputs
    $name = mysqli_real_escape_string($condb, $_POST['name']);
    $password = $_POST['password'];

    // Query to fetch user details
    $sql = "SELECT * FROM register WHERE name = '$name'";
    $result = mysqli_query($condb, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Start a session for the logged-in user
            session_start();
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['name'] = $user['name'];

            echo "<script>alert('Login successful!'); window.location.href='patient_record.php';</script>";
        } else {
            echo "<script>alert('Login failed. Incorrect password.');</script>";
        }
    } else {
        echo "<script>alert('Login failed. Name not registered.');</script>";
    }
}
?>
 <?php include("footer.php"); ?>