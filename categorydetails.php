<?php
// Database connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'attendancecreate';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the directory to save uploaded files
// $uploadDirectory = __DIR__ . '/uploads/'; // Assuming a directory named 'uploads' in the same directory as this script

// Check if the directory exists, and create it if it doesn't
// if (!file_exists($uploadDirectory)) {
//     mkdir($uploadDirectory, 0755, true);
// }

// File upload handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $batch = $_POST["batch"];
    $students =$_POST["students"];
    $department =$_POST["department"];
   $faculty =$_POST["faculty"];


    
    $sql = "INSERT INTO batchesdetails( batch, students, department, faculty) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $batch, $students, $department, $faculty );
    if ($stmt->execute()) {
        // Move the uploaded file to the specified directory
        // $uploadedFilePath = $uploadDirectory . $image_name;
        // move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFilePath);

        header('location:category.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>






