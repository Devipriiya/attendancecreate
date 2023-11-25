<?php
session_start();
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
$uploadDirectory = __DIR__ . '/uploads/'; // Assuming a directory named 'uploads' in the same directory as this script

// Check if the directory exists, and create it if it doesn't
if (!file_exists($uploadDirectory)) {
    mkdir($uploadDirectory, 0755, true);
}

// File upload handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $present = $_POST["present"];
    $batch = $_SESSION['batch'];
    $course = $_SESSION['course'];
    $batch = 'batch01';

    echo $course;
 

    // Iterate through the array and insert values into the database
    for ($i = 0; $i < count($name); $i++) {
        $studentName = $name[$i];
        $attendanceStatus = $present[$i];

        $sql = "INSERT INTO presentdetails (name, present, date, batch, course) VALUES (?, ?, CURDATE(), ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $studentName, $attendanceStatus, $batch, $course);

        if ($stmt->execute()) {
            // Insert successful
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    // Move the uploaded file to the specified directory
    // $uploadedFilePath = $uploadDirectory . $image_name;
    // move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFilePath);

     echo "<script type='text/javascript'>alert('Attendance Marked');window.location.href='present.php?course=".$course."';</script>";
  

}

$conn->close();
?>







