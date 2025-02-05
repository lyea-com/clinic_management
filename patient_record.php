<?php include("header.php"); ?>
 <?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM register WHERE user_id='$user_id' LIMIT 1";
$result = mysqli_query($condb, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<head>
    <body>
        <title>
        CLINIC MEDIC 
        </title>
        <style>
             .profile-container {
            width: 40%;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
        }
        </style>

        
<div class="profile-container">
    <h2>PATIENT RECORD</h2>
    <p>
    <div class="info">
    <p><strong>Name:</strong> <?php echo htmlspecialchars($row["name"]); ?></p>
    <p><strong>Gender:</strong> <?php echo htmlspecialchars($row["gender"]); ?></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($row["phone"]); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($row["email"]); ?></p>
    <p><strong>Date:</strong> <?php echo htmlspecialchars($row["date"]); ?></p>
    <p><strong>Medical History:</strong> <?php echo htmlspecialchars($row["medical_history"]); ?></p>
    <p>
    <a href="export_pdf.php" target="_blank">
    <button style="background-color: #f48fb1; color: white; margin: 15px 0;">Export PDF</button>
</a>

</div>


</body>
</html>
<?php include("footer.php"); ?>