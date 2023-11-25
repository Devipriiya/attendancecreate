<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
</style>
</head>
<body style="overflow:hidden">



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
    font-family: Arial, Helvetica, sans-serif;

">
</a>

  


  
  <div class="header-right">
 
  
    <a  href="first.php" style="color:white">Home</a>
    <a href="home.php" style="color:white">Profile</a>
    <a  href="about.php" style="color:white">About</a>
    <a  href="courses.php" style="color:white">Courses</a>

    <a href="attendance.php" style="color:white">Attendance</a>
    <!-- <input type="text" id="search-bar" placeholder="Search" style="margin-top:4px;border:none"> -->
        <!-- <button id="search-button">Search</button> -->
        <!-- <div id="search-results"> -->
        <!-- Search results will be displayed here -->
    <!-- </div> -->
  </div>
</div><br><br>

<h2 style="    text-align: center;
    margin-top: 140px;
    position: fixed;
    margin-left: 423px;">Student Details:</h2>

<table style="width:50%;
    margin-left: 429px;margin-top:211px;position:fixed">
<tbody>

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

        if (isset($_GET['id'])){
            $id = $_GET['id'];
          
        // Query to select all images from the table
        $sql = "SELECT * FROM studentdetails where id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Retrieve the image data
          
                
		
                
          
                
             
                $name = $row['name'];
				$mobile= $row['mobile'];
            	$email= $row['email'];
                $gender= $row['gender'];
http://localhost/musicon/landing/create.php
                // Generate the HTML for each image with Bootstrap card styling
             
               echo '<tr>';
               echo '<th>Name:</th>';
               echo '<td>'.$name.'</td>';
               echo '</tr>';
               echo '<tr>';
               echo '<th>Mobile Number:</th>';
               echo '<td>'.$mobile.'</td>';
               echo '</tr>';
               echo '<tr>';
               echo '<th>Email id:</th>';
               echo '<td>'.$email.'</td>';
               echo '</tr>';
               echo '<tr>';
               echo '<th>Gender</th>';
               echo '<td>'.$gender.'</td>';
               echo '</tr>';
               echo '<td><button onclick="deleteFaculty(' . $id . ')" style="background-color:rgb(96 196 175);border:none;color:white">Delete</button></td>';

// ... existing code
echo '<td><button onclick="editFaculty(' . $id . ')"  style="background-color:rgb(96 196 175);border:none;color:white">Edit</button></td>';
echo '</tr>';
            }
        } else {
            echo 'No images found in the table.';
        }
    }
        $conn->close();
        ?>
     </tbody>    
</table>
 <div class="container" style="margin-left:75px;position:fixed;  margin-top: 353px;">
<button class="hov btn2" style="margin-top:6px;margin-left:388px;width:165px;    background-color: rgb(96 196 175);
    border: none;
    height: 25px;
    border-radius: 3px;">

  <a href="form.php?id=<?php echo $id; ?>"style="text-decoration:none;color:white;" >Academic Performance</a></button>
  <!-- <button class="hov btn2" style="    margin-top: -44px;    background-color: rgb(96 196 175);
    border: none;
    height: 25px;
    border-radius: 3px;
    margin-left: 190px;width:165px"><a href="facultytable.php" style="text-decoration:none;color:white">Attendance Performance</a></button>

</div> --><script>
function deleteFaculty(id) {
    var confirmDelete = confirm('Are you sure you want to delete this faculty member?');

    if (confirmDelete) {
        // Redirect to the PHP script that will handle the deletion
        window.location.href = 'delete_studdetails.php?id=' + id;
    }
}
</script>

<script>
function editFaculty(id) {
    // Redirect to the page where you can edit the faculty member
    window.location.href = 'edit_studdetails.php?id=' + id;
}
</script>

</body>
</html>