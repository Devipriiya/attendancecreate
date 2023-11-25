<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty List</title>
    <link rel="stylesheet" href="css/main.css">
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="bootstable.min.js"></script>
</head>
<body style="overflow-y:scroll;height:800px;">
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
    <a href="home.php" style="color:white">Profile</a>
    <a  href="about.php" style="color:white">About</a>
    <a  href="batch.php" style="color:white">Courses</a>

    <a class="active" href="attendance.php" style="color:white">View Attendance</a>

    <!-- <input type="text" id="search-bar" placeholder="Search" style="margin-top:4px;border:none"> -->
        <!-- <button id="search-button">Search</button> -->
        <!-- <div id="search-results"> -->
        <!-- Search results will be displayed here -->
    <!-- </div> -->
  </div>
</div><br><br>
<input type="text" id="filterInput" placeholder="Search..." style="text-align: center;
    width: 14%;
    height: 38px;
    border-radius: 39px;
    background-color: #c4baba42;
    margin-left: 678px;

    border:none">
    <table  class="content-table" id="makeEditable">
     
     
    

    <!-- <h2 style="text-align:center">Student Details</h2> -->
    <h5  style="text-align: center;
    margin-left: -260px;
    left: 2px;
    font-size: 25px;
    font-weight: 300;">Faculty list</h5>
    <thead>
          <tr>
            <th>S.no</th>
            <th>Name</th>
            <th>Coursecode </th>
            <th>Action </th>
        
            <!-- <span style=""><button id="but_add">Add row</button></span> -->
          </tr>
        </thead>
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

        // Query to select all images from the table
        $sql = "SELECT * FROM facultytable";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Retrieve the image data
          
                
		
                
          
                
             $number= $row['number'];
                $name = $row['name'];
				$department= $row['department'];
            
                
http://localhost/musicon/landing/create.php
                // Generate the HTML for each image with Bootstrap card styling
               echo '<tr>';
              
                    
               echo  '<td>'.$number.'</td>';
                echo  '<td>'.$name.'</td>';
               echo  '<td>'.$department.'</td>';
               echo  '<td>';
               echo '<a href="delete_faculty.php?sno=' . $number . '" 
               onclick="return confirm(\'Are you sure you want to delete this faculty member?\')">Delete</a>';
               echo '<a href="facultytable.php?sno=' . $number . '" style="    margin-left: 8px;">Edit</a>';
               echo  '</td>';

            //    echo   '<td>'.edit.'</td>';
              echo  '</tr>';

echo '</tr>';

            }
        } else {
            echo 'No images found in the table.';
        }

        $conn->close();
        ?>
         
        
        </tbody>
      </table>
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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['sno'])) {
    $sno = $_GET['sno'];

    // Retrieve the data of the selected faculty member
    $sql = "SELECT * FROM facultytable WHERE number = '$sno'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $department = $row['department'];
        // Add more fields as needed

        // Display the form with existing data
        echo '
        <form action="update_faculty.php" method="POST" style="height:60px;width:360px;">
            <input type="hidden" name="sno" value="' . $sno . '">
       
            <input type="text" name="name" value="' . $name . '">
          
            <input type="text" name="department" value="' . $department . '">
            <!-- Add more fields as needed -->
            <input type="submit" value="Update" style="    height: 45px;
            background-color: rgb(1, 170, 133);
            color: white;">
        </form>';
        
    } else {
        echo 'Faculty member not found.';
    }
}

$conn->close();
?>



      <script>
        const filterInput = document.getElementById('filterInput');
        const tableRows = document.querySelectorAll('tbody tr');

        // Function to filter the table data
        function filterTable() {
            const filterText = filterInput.value.toLowerCase();

            tableRows.forEach((row) => {
                const number = row.querySelector('td:first-child').textContent.toLowerCase();
                const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const department = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
              

                if (number.includes(filterText) || name.includes(filterText) || department.includes(filterText)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Event listener to trigger filtering on input change
        filterInput.addEventListener('input', filterTable);
    </script>
      <button class="btnOpen">Add new Faculty</button>
      <section class="box">
          <div class="close">&times;</div>
          <div class="circle">
             <span class="register-head"></span>
            <span class="register-body"></span>
    
            <!--Add these two lines below to your current code -->
          <span class="slant-left"></span>
          <span class="slant-right"></span>
          <!-- end -->
          </div>
          <form action="facultytablemain.php" method="POST" enctype="multipart/form-data" >
          <div class="registration-box">
              <div>
                  <input type="text" 
                   name="number" required="required">
                  <label>S.No</label>
               </div>
      
               <div>
                  <input type="text"
                    name="name" required="required">
                  <label>Name</label>
               </div>
               <div>
             <input type="text" name="department" required>
                 <label>Coursecode</label>
               </div>
               <!-- <input type="file" name="image" required>
               <label for ="event"></label> -->
             </div>
    <button class="btnSubmit">Submit</button>
            </div>
    
            
              </form>
  
               <!-- Add these lines below to your current code -->
              <div class="confirmation-box" style="display: none;">
                 <h1>Registration Confirmed</h1>
                  <div class="body-text">                  
                 </div>
                <p> Thank You. </p>               
                 <button class="btnClose">Close</button>
                 </div>
                 <!-- end -->
      </section>   
      <style>
        .box{
        position: relative;
        border-radius: 12px;
        width: 330px; 
        margin: 0 auto;
        text-align: center;
        padding: 18px;
        background-color: #fcfcfc;
        display: none; 
    }
    /* Head part of user icon */
    .circle .register-head{
        display: inline-block;
        width: 18px;
        height: 20px;
        margin: 0 auto;
        margin-top: 6px;
        border-radius: 50%;
        left: 0;
        right: 0;
        background-color: #fff;
    }
    /* Body part of user icon */
    .circle .register-body{
        display: inline-block;
        width: 35px;
        margin: 0 auto;
        margin-top: 26px;
        height: 25px;
        border-radius: 50%;
        left: 0;
        right: 0;
        background-color: #fff;
    }
    .close{
        display: block;
        position: absolute;
        width: 40px;
        height: 40px;
        top: 0;
        right: 0;
        color: tomato;
        font-size: 34px;
    }
    .close:hover{
        background-color: red;
        border-radius: 0 12px 0 0;
        color: #fcfcfc;
        cursor: pointer;
    }
    .registration-box{
        margin-top: 43px; 
    }
    label{
        display: block;
        position: absolute;
        font-size: 18px;
        color: rgb(169, 171, 170);
        margin-top: -62px;
        padding-left: 18px;
        text-align: left;
        pointer-events: none;
        transition: .4s;
    }
    input{
        width: 95%;
        height: 41px;
        margin: 10px 1px 28px 1px;
        padding: 9px;
        font-size: 18px;
        color: #555;
        border: rgb(65, 118, 97) 1px solid;
        outline: none;
        border-radius: 5px;
    }
    input:focus~label,
    input:valid~label{
        margin-top: -95px;
        padding-left: 8px;
        color: #026948;
        font-weight: 500;
    }
    
    h1{
        margin-top: 28px;
        margin-bottom: 28px;
        font-size: 21px;
        font-weight: 300;
    }
    .circle{
        position: absolute;
        margin: 0 auto;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        top: -35px;
        right: 0;
        left: 0;
        background-color: rgb(1, 170, 133);
        border: 2px #fff solid;
    }
    
    
    .box .circle, .box span{
        display: inline-block;
        position: absolute;
    }
    .box span{
        height: 2px;
        background-color: rgb(1, 170, 133);
    }
    .body-text{
        font-size: 17px;
        line-height: 25px;
    }
    p{
        margin-top: 2px;
        font-size: 22px;
    }
    button{
        display: block;
        margin: 0 auto;
        margin-top: 62px;
        padding: 10px 43px 10px 43px;
        border: none;
        border-radius: 32px;
        font-size: 20px;
        background-color: rgb(1, 170, 133);
        color: #fcfcfc;
    }
    button:hover, button:focus{
        background-color: rgb(3, 145, 144);
        outline: rgb(2, 137, 108) 2px solid;
        cursor: pointer;
    }
    /* Add these lines below to your current code  */
    /* Right side of the check mark icon */
    .circle .slant-right{
         width: 29px;
         top: 27px;
         left: 16px;
         transform: rotate(-45deg);
         display: none;
         animation: slant-animate 1s ease-in forwards;
    }
    
    /* Left side of the check mark sign */
    .circle .slant-left{
        width: 16px;
        top: 32px;
        left: 8px;
        transform: rotate(50deg);
        display: none;
        animation: slant-animate .8s ease-in forwards; 
    }
    
    @keyframes slant-animate{
        to{
            background-color: #fff;
        }
    }
    /* end */
    
    
    /* For small devices */
    @media(max-width: 350px){
    .box{
        width: 90%;
    }
    }
    
    
    
    
        </style>
        <script>
            let btnOpen = document.querySelector(".btnOpen");
    let box = document.querySelector(".box");
    let body = document.querySelector("body");
    //Note: this is not a class but a tag name. 
    //That is why it is not referenced with the "." sign
    let close = document.querySelector(".close");
    
    let registerHead = document.querySelector(".register-head");
    let registerBody = document.querySelector(".register-body");
    let slantLeft = document.querySelector(".slant-left");
    let slantRight = document.querySelector(".slant-right");
    let first_name = document.querySelector(".first_name");
    let last_name = document.querySelector(".last_name");
    let bodyText = document.querySelector(".body-text");
    let btnClose = document.querySelector(".btnClose");
    
    let registrationBox = document.querySelector(".registration-box");
    let confirmationBox = document.querySelector(".confirmation-box");
    let btnSubmit = document.querySelector(".btnSubmit");
    
    btnSubmit.addEventListener("click", ()=>{
    
        bodyText.innerHTML="Hi, " + first_name.value + "  your registration has been received. We are glad to have you.";
        
        registerHead.style.display="none";    
        registerBody.style.display="none";
    
        slantLeft.style.display="block";    
        slantRight.style.display="block";    
        
        registrationBox.style.display="none";
        confirmationBox.style.display="block";
    });
    
    btnOpen.addEventListener("click", ()=>{
        btnOpen.style.display="none";
        box.style.display="block";
        body.style.backgroundColor="#a8a8a8";
    });
    
    close.addEventListener("click", ()=>{
        btnOpen.style.display="block";
        box.style.display="none";
        body.style.backgroundColor="#a8a8a8";
    });
    btnClose.addEventListener("click", ()=>{
        btnOpen.style.display="block";
        box.style.display="none";
        body.style.backgroundColor="#a8a8a8";
    });
            </script>
    
</body>
<style>
* {
    /* Change your font family */
    font-family: sans-serif;
}

.content-table {
    border-collapse: collapse;
    margin: 43px 358px;
    font-size: 0.9em;
    min-width: 627px;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
    background-color: rgb(96 196 175);
    color: #ffffff;
    text-align: left;
    font-weight: bold;
}

.content-table th,
.content-table td {
    padding: 12px 15px;
}

.content-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
</style>
<!-- <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
 $('#makeEditable').SetEditable({ $addButton: $('#but_add')}); -->
</script>
</html>


















