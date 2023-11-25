<style>


.header {
  overflow: hidden;
    background-color: rgb(96 196 175);
    padding: 20px 19px;
    height: 40px;
    width: 1390px;
    margin-left: -10px;
    margin-top: -8px;
    font-family: sans-serif;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: #347cc3;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}
.search-container {
    text-align: center;
    margin: 20px;
}

#search-bar {
    width: 331px;
    padding: 10px;
    border: 2px solid #333;
    border-radius: 5px;
    font-size: 16px;
}

#search-button {
    padding: 10px 20px;
    background-color: #333;
    color: white;
    border: none;
    border-radius: 5px;
    margin-left: 10px;
    font-size: 16px;
    cursor: pointer;
}

#search-results {
    text-align: center;
    margin: 20px;
}

</style>
</head>
<body>

<div class="header">
  <img src="uploads/image_6-removebg-preview.png" class="logo" style="
        margin-top: -33px;
    width: 156px;
    margin-left: 33px;

">
</a>

  


  
  <div class="header-right">
 
  
    <a  href="first.php" style="color:white">Home</a>
    <a href="home.php" style="color:white">Profile</a>
    <a  href="about.php" style="color:white">About</a>
    <a  href="courses.php" style="color:white">Courses</a>

    <a class="active" href="attendance.php" style="color:white">View Attendance</a>

    <!-- <input type="text" id="search-bar" placeholder="Search" style="margin-top:4px;border:none"> -->
        <!-- <button id="search-button">Search</button> -->
        <!-- <div id="search-results"> -->
        <!-- Search results will be displayed here -->
    <!-- </div> -->
  </div>
</div><br><br>


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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query to select faculty member data for editing
    $sql = "SELECT * FROM facultydetails WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Fetch data and display the form for editing
        $name = $row["name"];
        $institutionid = $row["institutionid"];
        $department = $row["department"];
        $coursecode = $row["coursecode"];
        $mobile = $row["mobile"];
        $date = $row["date"];
        $email = $row["email"];
        $address = $row["address"];

        // Display the form for editing
        echo '<form action="update_facdetails.php" method="post" style="    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        padding: 16px;
        text-align: center;
        background-color: #f1f1f1;">';
        echo '<input type="hidden" name="id" value="' . $id . '">';
        // echo '<label for="name">Name:</label>';
        echo '<input type="text" name="name" value="' . $name . '"><br>';
        // echo '<label for="name">institutionid:</label>';
        echo '<input type="text" name="institutionid" value="' . $institutionid . '"><br>';
        // echo '<label for="name">department:</label>';
        echo '<input type="text" name="department" value="' . $department . '"><br>';
        // echo '<label for="name">coursecode:</label>';
        echo '<input type="text" name="coursecode" value="' . $coursecode . '"><br>';
        // echo '<label for="name">mobile:</label>';
        echo '<input type="text" name="mobile" value="' . $mobile . '"><br>';
        // echo '<label for="name">date:</label>';
        echo '<input type="text" name="date" value="' . $date . '"><br>';
        // Add similar lines for other fields
        // echo '<label for="name">email:</label>';
        echo '<input type="text" name="email" value="' . $email . '"><br>';
        // echo '<label for="name">address:</label>';
        echo '<input type="text" name="address" value="' . $address . '"><br><br>';
        echo '<input type="submit" value="Update" style="    background-color: rgb(96 196 175);
        border: none;
        color: white;">';
        echo '</form>';
    } else {
        echo 'Faculty member not found.';
    }
}

$conn->close();
?>
