<?php
include('header.php');
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'attendancecreate';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


 ?>

<!DOCTYPE html>
<html>
<head>
    <title>User management</title>
</head>
<body style="overflow-y:scroll;height:800px">
<style>


.header {
  overflow: hidden;
  background-color:rgb(96 196 175);
  padding: 20px 10px;
  height:82px;
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
    <a href="#contact" style="color:white">Profile</a>
    <a  href="about.php" style="color:white">About</a>
    <a  href="courses.php" style="color:white">Courses</a>

    <a class="active" href="attendance.php" style="color:white">View Attendance</a>
    <!-- <input type="text" id="search-bar" placeholder="Search" style="margin-top:4px;border:none"> -->
        <!-- <button id="search-button">Search</button> -->
        <!-- <div id="search-results"> -->
        <!-- Search results will be displayed here -->
    <!-- </div> -->
  </div>
</div>
    <div class="main"> 
<!-- <div class="jumbotron">
  <h1 class="display-4">User Management</h1>
  <p class="lead">From Here you can add the new Students.</p>
  <hr class="my-4">
   <div class="d-flex justify-content-center" style="margin-top: 30px;">
  <p>Feel Free to add the new students . Just click on the button below to add the new student</p>
  </div> -->
  <h2 style="margin-top: 14px;
    margin-left: -174px;">Students List</h2>
  <div class="d-flex justify-content-center">
  <!-- <a class="btn btn-primary btn-lg" href="Add_user.php" role="button" style="border-color:rgb(96 196 175);background-color:rgb(96 196 175)">Add student</a> -->
 </div>
</div>
</div>

</body>
</html>
<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>User View</title>


<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Page level plugin JavaScript--><script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

</head>
<style type="text/css">
	.data{
		margin-left: -185px;
	}
</style>
<body>


  <?php
    $date = date('Y-m-d'); // Get the current date in 'YYYY-MM-DD' format

    // $sql = "SELECT * FROM presentdetails WHERE date = '$date'";
    $sql = "SELECT lc.batch, lc.batches, cc.name, cc.present, cc.date FROM presentdetails cc INNER JOIN studenttable lc ON cc.name = lc.name WHERE date = '$date'";
    
$result = $conn->query($sql);

?>
   
<div class="main">
  <button style="float: right; margin-right: 12px;border-color:rgb(96 196 175);background-color:rgb(96 196 175);"><a href="courses.php" style="text-decoration:none;color:white" >Mark Attendance</a></button>
    <button style="float: right; margin-right: 12px;border-color:rgb(96 196 175);background-color:rgb(96 196 175);" 
    class="btn btn-primary my-2 my-sm-0" onclick="exportToExcel('dataTable', 'user-data')"><i class="fas fa-download"></i> Generate Report</button> <br><br>
	<div class="data">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <!-- <th>Email</th> -->
                <th>Add Date</th>
                <th>Course</th>
                <th>Batches</th>
              <th>Attendance</th>
           

            </tr>
        </thead>
        <tbody>
            <?php 
            if ($result->num_rows > 0) {

  // output data of each row

while($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php  echo $row["name"]  ?></td>
                <td><?php  echo $row["date"]  ?></td>
                <td><?php  echo $row["batch"]  ?></td>
                <td><?php  echo $row["batches"]  ?></td>

                <td><?php  echo $row["present"] ?></td>
              
            </tr>
            <?php 
  }
}  

?> 
        </tbody>
    </table>


</div>
</div>
</body>
</html>
<script>
	$(document).ready(function() {
          $('#dataTable').DataTable();
    });

</script> 


<script type="text/javascript">
function exportToExcel(tableID, filename = ''){
    var downloadurl;
    var dataFileType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTMLData = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'export_excel_data.xls';
    
    // Create download link element
    downloadurl = document.createElement("a");
    
    document.body.appendChild(downloadurl);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTMLData], {
            type: dataFileType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadurl.href = 'data:' + dataFileType + ', ' + tableHTMLData;
    
        // Setting the file name
        downloadurl.download = filename;
        
        //triggering the function
        downloadurl.click();
    }
}

</script>

