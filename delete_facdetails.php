<?php
// delete_faculty.php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'attendancecreate';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Perform the deletion
    $sql = "DELETE FROM facultydetails WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo 'Faculty member deleted successfully.';
        header ('location:facultydetails.php');
    } else {
        echo 'Error deleting faculty member: ' . $conn->error;
    }
}

$conn->close();
?>
