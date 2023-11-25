<?php
// Establish a database connection

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'attendancecreate';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from JavaScript using POST
$request_body = file_get_contents('php://input');
$DataArray = json_decode($request_body, true);

// Check if the data is in the correct format
if ($DataArray === null) {
    die("Invalid JSON data");
}

// Iterate over each item in the array
foreach ($DataArray as $score) {
    $code = $score["courseCode"];
    $load = $score["unitLoad"];
    $grade = $score["grade"];

    $gpa = $score["gpa"]; // Access the GPA value

    // Insert data into the database, including GPA
    $sql = "INSERT INTO coursetable (code, load_data, grade, gpa) VALUES ('$code', '$load', '$grade', '$gpa')";

    if ($conn->query($sql) !== true) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } else {
        echo "Data inserted successfully!";
    }
}

// Close the database connection
$conn->close();
?>
