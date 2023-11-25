<?php
// update_faculty.php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'attendancecreate';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sno'])) {
    $sno = $_POST['sno'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    // Retrieve more fields as needed

    // Update the faculty member data
    $sql = "UPDATE facultytable SET name='$name', department='$department' WHERE number='$sno'";
    if ($conn->query($sql) === TRUE) {
        header ('location:facultytable.php');
    } else {
        echo 'Error updating faculty member: ' . $conn->error;
    }
}

$conn->close();
?>
