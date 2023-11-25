<?php
// delete_faculty.php

// Database connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'attendancecreate';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the S.No parameter is set
if (isset($_GET['sno'])) {
    // Sanitize the input to prevent SQL injection
    $sno = mysqli_real_escape_string($conn, $_GET['sno']);

    // Perform the DELETE query
    $sql = "DELETE FROM facultytable WHERE number = '$sno'";

    if ($conn->query($sql) === TRUE) {
        header ('location:facultytable.php');
   
        
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "S.No not provided";
}

// Close the database connection
$conn->close();
?>
