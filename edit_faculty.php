<?php
// edit_faculty.php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'attendancecreate';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['sno'])) {
    $sno = $_GET['sno'];

    // Retrieve the data of the selected faculty member
    $sql = "SELECT * FROM facultytable WHERE number = '$sno'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $department = $row['department'];
        // Add more fields as needed

        // Display the form with existing data
        echo '
        <form action="update_faculty.php" method="POST">
            <input type="hidden" name="sno" value="' . $sno . '">
            <label for="name">Name:</label>
            <input type="text" name="name" value="' . $name . '">
            <label for="department">Department:</label>
            <input type="text" name="department" value="' . $department . '">
            <!-- Add more fields as needed -->
            <input type="submit" value="Update">
        </form>';
        
    } else {
        echo 'Faculty member not found.';
    }
}

$conn->close();
?>
