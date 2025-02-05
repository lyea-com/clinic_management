<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DASHBOARD</title>
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

        h1 {
            color: #333;
        }

        button {
            background-color: pink;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: pink;
        }

        .buttons {
            margin-top: 20px;
        }

        .buttons a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: pink;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .buttons a:hover {
            background-color: pink;
        }

    </style>
</head>
<body>

<div class="profile-container">
    <h1>Welcome to Admin Dashboard</h1>

    <div class="buttons">
        <a href="manage_record.php">MANAGE PATIENT RECORD</a>
    </div>
</div>

</body>
</html>
<?php include("footer.php"); ?>