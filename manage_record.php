<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Patient Record</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .tabs {
            margin-bottom: 20px;
        }
        .tablink {
            padding: 10px 20px;
            cursor: pointer;
        }
        .tabcontent {
            display: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        .active {
            background-color: #f48fb1;
            color: white;
        }
    </style>
</head>
<body>

    <div class="content">
        <h2>Manage Patient Records</h2>

        <!-- Navigation Tabs -->
        <div class="tabs">
            <button class="tablink" onclick="openTab(event, 'Create')">Create Patient</button>
            <button class="tablink" onclick="openTab(event, 'Read')">Read Patient</button>
            <button class="tablink" onclick="openTab(event, 'Update')">Update Patient</button>
            <button class="tablink" onclick="openTab(event, 'Delete')">Delete Patient</button>
        </div>

        <!-- Create Patient Section -->
        <div id="Create" class="tabcontent">
        <div style="text-align: center;">
    <h3>Create New Patient Record</h3>
</div>


            <form action="create_patient.php" method="POST">
            
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" placeholder="Enter your name" required>

            <label for="gender">Gender:</label>
            <input type="text" name="gender" id="gender" placeholder="Male/Female" required>

            <label for="phone">Phone:</label>
            <input type="number" name="phone" id="phone" placeholder="Enter your phone number" required>

            <label for="email">Email:</label>
            <input type="text" name="email" id="email" placeholder="Enter your email" required>

            <label for="date">Date:</label>
            <input type="text" name="date" id="date" placeholder="Enter the current visit date" required>

            <label for="medical_history">Medical History:</label>
            <input type="text" name="medical_history" id="medical_history" placeholder="Describe any medical history (optional)" required>

             <input type="submit" value="Submit">
            </form>
        </div>

        <!-- Read Patient Section with Search -->
        <div id="Read" class="tabcontent">
        <div style="text-align: center;">
            <h3>Read Patient Records</h3>
            </div>

            <!-- Search Bar -->
            <form method="GET" action="">
                <input type="text" name="search" placeholder="Search by name" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit">Search</button>
            </form>

            <?php
            // Database connection
            $conn = new mysqli("localhost", "root", "", "clinic");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
            $sql = !empty($search) ? 
                "SELECT * FROM register WHERE name LIKE '%$search%'" : 
                "SELECT * FROM register";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Medical History</th>
                        </tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['user_id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['gender']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['date']}</td>
                            <td>{$row['medical_history']}</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No patient records found.</p>";
            }

            $conn->close();
            ?>
        </div>

        <!-- Update Patient Section -->
        <div id="Update" class="tabcontent">
        <div style="text-align: center;">
            <h3>Update Patient Record</h3>
        </div>
            <form action="update_patient.php" method="POST">

            <label for="user_id">Patient ID:</label>
            <input type="number" id="user_id" name="user_id" placeholder="Enter the correct ID" required><br><br>

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" placeholder="Enter your name" required>

            <label for="gender">Gender:</label>
            <input type="text" name="gender" id="gender" placeholder="Male/Female" required>

            <label for="phone">Phone:</label>
            <input type="number" name="phone" id="phone" placeholder="Enter your phone number" required>

            <label for="email">Email:</label>
            <input type="text" name="email" id="email" placeholder="Enter your email" required>

            <label for="date">Date:</label>
            <input type="text" name="date" id="date" placeholder="Enter the current visit date" required>

            <label for="medical_history">Medical History:</label>
            <input type="text" name="medical_history" id="medical_history" placeholder="Describe any medical history (optional)" required>

            <input type="submit" value="Update">
            </form>
        </div>

        <!-- Delete Patient Section -->
        <div id="Delete" class="tabcontent">
        <div style="text-align: center;">
            <h3>Delete Patient Record</h3>
        </div>
            <form action="delete_patient.php" method="POST">
                <label>Patient ID:</label>
                <input type="number" name="user_id" placeholder="Enter Patient ID" required><br>
                <input type="submit" value="Delete">
            </form>
        </div>
    </div>

    <!-- JavaScript for Tab Switching -->
    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("active");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.classList.add("active");
        }

        // Open the "Read" tab by default
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelector(".tablink:nth-child(2)").click();
        });
    </script>

</body>
</html>
