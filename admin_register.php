<?php include("header.php"); ?>
<?php
session_start();
require_once('db.php'); // Database connection

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($condb, $_POST['name']);
    $password = $_POST['password'];

    // Check if the username already exists
    $check_sql = "SELECT * FROM admin WHERE name = ?";
    $stmt = mysqli_prepare($condb, $check_sql);
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);
    $check_result = mysqli_stmt_get_result($stmt);

    if ($check_result && mysqli_num_rows($check_result) > 0) {
        $error = "Username already exists. Please choose another.";
    } else {
        // Password hashing
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert new admin into the database using a prepared statement
        $insert_sql = "INSERT INTO admin (name, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($condb, $insert_sql);
        mysqli_stmt_bind_param($stmt, "ss", $name, $hashed_password);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Registration successful!'); window.location.href='admin_login.php';</script>";
            exit();
        } else {
            $error = "Error: " . mysqli_error($condb);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Register</title>
    <style>
        body {
            background-color: #f4f4f9;
            font-family: Arial, sans-serif;
        }
        .register-container {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #f48fb1;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background-color: #f48fb1;
        }
        .error {
            color: red;
            text-align: center;
        }
        .success {
            color: green;
            text-align: center;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Admin Register</h2>
    
    <?php if (!empty($error)) { echo "<p class='error'>$error</p>"; } ?>
    <?php if (!empty($success)) { echo "<p class='success'>$success</p>"; } ?>
    
    <form method="POST">
        <label for="name">Username:</label>
        <input type="text" name="name" id="name" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Register</button>
    </form>
    <p style="text-align: center; margin-top: 10px;">Already have an account? <a href="admin_login.php">Login here</a></p>
</div>

</body>
</html>
<?php include("footer.php"); ?>