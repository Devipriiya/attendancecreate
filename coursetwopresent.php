<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Attendance</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
}

h1 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: center;
}

th {
    /* background-color: #f2f2f2; */
}

#attendance {
    margin: 20px;
}

#summary {
    margin: 20px;
}

input[type="checkbox"] {
    width: 20px;
    height: 20px;
}

</style>
<body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

:root{
   --blue:#3498db;
   --dark-blue:#2980b9;
   --red:#e74c3c;
   --dark-red:#c0392b;
   --black:#333;
   --white:#fff;
   --light-bg:#eee;
   --box-shadow:0 5px 10px rgba(0,0,0,.1);
}

*{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border: none;
   text-decoration: none;
}

*::-webkit-scrollbar{
   width: 10px;
}

*::-webkit-scrollbar-track{
   background-color: transparent;
}

*::-webkit-scrollbar-thumb{
   background-color: grey;
}

.btn,
.delete-btn{
   width: 100%;
   border-radius: 5px;
   padding:10px 30px;
   color:black;
   display: block;
   text-align: center;
   cursor: pointer;
   font-size: 20px;
   margin-top: 10px;
}

.btn{
   background-color: #76e1d2;
}

.btn:hover{
   background-color: var(--dark-blue);
}

.delete-btn{
   background-color: var(--red);
}

.delete-btn:hover{
   background-color: var(--dark-red);
}

.message{
   margin:10px 0;
   width: 100%;
   border-radius: 5px;
   padding:10px;
   text-align: center;
   background-color: var(--red);
   color:var(--white);
   font-size: 20px;
}

.form-container{
   min-height: 100vh;
   background-color: var(--light-bg);
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
}

.form-container form{
   padding:20px;
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   text-align: center;
   width: 500px;
   border-radius: 5px;
}

.form-container form h3{
   margin-bottom: 10px;
   font-size: 30px;
   color:var(--black);
   text-transform: uppercase;
}

.form-container form .box{
   width: 100%;
   border-radius: 5px;
   padding:12px 14px;
   font-size: 18px;
   color:var(--black);
   margin:10px 0;
   background-color: var(--light-bg);
}

.form-container form p{
   margin-top: 15px;
   font-size: 20px;
   color:var(--black);
}

.form-container form p a{
   color:var(--red);
}

.form-container form p a:hover{
   text-decoration: underline;
}

.container{
   min-height: 100vh;
   background-color: var(--light-bg);
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
}

.container .profile{
   padding:20px;
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   text-align: center;
   width: 400px;
   border-radius: 5px;
}

.container .profile img{
   height: 150px;
   width: 150px;
   border-radius: 50%;
   object-fit: cover;
   margin-bottom: 5px;
}

.container .profile h3{
   margin:5px 0;
   font-size: 20px;
   color:var(--black);
}

.container .profile p{
   margin-top: 20px;
   color:var(--black);
   font-size: 20px;
}

.container .profile p a{
   color:var(--red);
}

.container .profile p a:hover{
   text-decoration: underline;
}

.update-profile{
   min-height: 100vh;
   background-color: var(--light-bg);
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
}

.update-profile form{
   padding:20px;
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   text-align: center;
   width: 700px;
   text-align: center;
   border-radius: 5px;
}

.update-profile form img{
   height: 200px;
   width: 200p;
   border-radius: 50%;
   object-fit: cover;
   margin-bottom: 5px;
}

.update-profile form .flex{
   display: flex;
   justify-content: space-between;
   margin-bottom: 20px;
   gap:15px;
}

.update-profile form .flex .inputBox{
   width: 49%;
}

.update-profile form .flex .inputBox span{
   text-align: left;
   display: block;
   margin-top: 15px;
   font-size: 17px;
   color:var(--black);
}

.update-profile form .flex .inputBox .box{
   width: 100%;
   border-radius: 5px;
   background-color: var(--light-bg);
   padding:12px 14px;
   font-size: 17px;
   color:var(--black);
   margin-top: 10px;
}

@media (max-width:650px){
   .update-profile form .flex{
      flex-wrap: wrap;
      gap:0;
   }
   .update-profile form .flex .inputBox{
      width: 100%;
   }
}
    </style>
<body style="    background-color:#eee;">
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
    <a class="active" href="batch.php" style="color:white">Courses</a>

    <a href="attendance.php" style="color:white">Attendance</a>
    <!-- <input type="text" id="search-bar" placeholder="Search" style="margin-top:4px;border:none"> -->
        <!-- <button id="search-button">Search</button> -->
        <!-- <div id="search-results"> -->
        <!-- Search results will be displayed here -->
    <!-- </div> -->
  </div>
</div>
<br>
    <h1>Student Attendance</h1>
    <div id="dataTable">
    <div id="attendance">
        <!-- <button style="float: right; margin-right: 12px;border-color:rgb(96 196 175);background-color:rgb(96 196 175);" class="btn btn-primary my-2 my-sm-0" onclick="exportToExcel('dataTable', 'user-data')"><i class="fas fa-download"></i> Generate Report</button> <br><br> -->
        <form action="presentdetails.php" method="POST" >
            <table>
                <tr style="    background-color: rgb(96 196 175);
    color: white;
}">
                    <th>Student Name</th>
                    <th>Present</th>
                    <th>Absent</th>
                </tr>
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

        if (isset($_GET['batch'])){
            $batch = $_GET['batch'];
            $_SESSION['batch'] = $batch;

        // Query to select all images from the table
        $sql = "SELECT * FROM studenttable where batches = '$batch'  ";
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Retrieve the image data
                $name = $row['name'];
                $id = $row['id'];

                // Generate the HTML for each image with Bootstrap card styling
                echo '<tr>';
                echo '<td>'.$name.'</td>';
                echo '<input type="hidden" name="batch" value='.$batch.' >  ';   
                
                echo '<input type="hidden" name="name[]" value='.$name.' >  ';   
                echo '<td><input type="checkbox" value="present" name="present[]" class="present-checkbox" data-status="present"></td>';
                echo '<td><input type="checkbox" value="absent" name="present[]" class="absent-checkbox" data-status="absent"></td>';
                echo '</tr>';
            }
        } }else {
            echo 'No images found in the table.';
        }

        $conn->close();
        ?>
                <!-- Add more rows for additional students -->
            </table><br>
            <input type="submit" value="submit" style="    border: none;
    background-color: #57c1b3;
    color: white;
    border-radius: 3px;
    font-size: 15px;
    width: 77px;
    height: 21px;
    text-align: center;
    margin-left: 1271px;">
        </form>
    </div>

    <!-- <div id="summary">
        <h2>Summary</h2>
        <p>Total Present: <span id="total-present">0</span></p>
        <p>Total Absent: <span id="total-absent">0</span></p>
    </div>
    <div id="lists">
        <h2>Lists</h2>
        <div id="present-list">
            <h3>Present List</h3>
            <ul></ul>
        </div>
        <div id="absent-list">
            <h3>Absent List</h3>
            <ul></ul>
        </div>
    </div>
</div> -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const attendanceForm = document.getElementById('attendance-form');
    const presentCheckboxes = document.querySelectorAll('.present-checkbox');
    const absentCheckboxes = document.querySelectorAll('.absent-checkbox');
    const totalPresentElement = document.getElementById('total-present');
    const totalAbsentElement = document.getElementById('total-absent');
    const presentList = document.getElementById('present-list').querySelector('ul');
    const absentList = document.getElementById('absent-list').querySelector('ul');

    function updateSummary() {
        const totalPresent = document.querySelectorAll('.present-checkbox:checked').length;
        const totalAbsent = document.querySelectorAll('.absent-checkbox:checked').length;

        totalPresentElement.textContent = totalPresent;
        totalAbsentElement.textContent = totalAbsent;
    }

    function updateLists() {
        presentList.innerHTML = '';
        absentList.innerHTML = '';

        presentCheckboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                const studentName = checkbox.parentElement.parentElement.querySelector('td').textContent;
                const listItem = document.createElement('li');
                listItem.textContent = studentName;
                presentList.appendChild(listItem);
            }
        });

        absentCheckboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                const studentName = checkbox.parentElement.parentElement.querySelector('td').textContent;
                const listItem = document.createElement('li');
                listItem.textContent = studentName;
                absentList.appendChild(listItem);
            }
        });
    }

    attendanceForm.addEventListener('submit', function(e) {
        e.preventDefault();
        updateSummary();
        updateLists();
    });
});

    </script>
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
</body>
</html>
