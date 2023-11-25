<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  overflow-y:scroll;
  height:800px;
  overflow-x:hidden;
  background-color: #f1f1f1;

}

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
 
  
    <a class="active" href="first.php" style="color:white">Home</a>
    <a href="home.php" style="color:white">Profile</a>
    <a href="about.php" style="color:white">About</a>
    <a href="courses.php" style="color:white">Courses</a>

    <a href="attendance.php" style="color:white">View Attendance</a>
    <!-- <input type="text" id="search-bar" placeholder="Search" style="margin-top:4px;border:none"> -->
        <!-- <button id="search-button">Search</button> -->
        <!-- <div id="search-results"> -->
        <!-- Search results will be displayed here -->
    <!-- </div> -->
  </div>
</div>
<br><br>


<div class="container" style="margin-left:75px">
  <!-- <button class="hov btn1" style="margin-left:6px;">Hover Me</button> -->
  <button class="hov btn2" style="margin-top:6px;margin-left:388px;width:165px">
  <a href="studenttable.php"style="text-decoration:none;color:white" >Students</a></button>
  <button class="hov btn2" style="    margin-top: -44px;
    margin-left: 190px;width:165px"><a href="facultytable.php" style="text-decoration:none;color:white">Facultys</a></button>
      <button class="hov btn2" style="margin-top:-40px;margin-left:783px;width:165px">
      <a href="courses.php" style="text-decoration:none;color:white">Category</a></button>
  <button class="hov btn2" style="       margin-top: -44px;
    margin-left: 586px;width:165px"><a href="list.html" style="text-decoration:none;color:white">list</a></button>
    
  <!-- <button class="hov btn3" style="margin-right:6px">Hover Me</button>
  <button class="hov btn4" style="margin-top:4px;margin-top:-7px">Hover Me</button> -->
</div>
<br><br><br>


    <script>
        // Get references to the search input and search button
const searchBar = document.getElementById("search-bar");
const searchButton = document.getElementById("search-button");
const searchResults = document.getElementById("search-results");

// Add a click event listener to the search button
searchButton.addEventListener("click", () => {
    const searchTerm = searchBar.value;

    // Simulate searching for results (you can replace this with actual search logic)
    searchResults.innerHTML = `Searching for: "${searchTerm}"...`;

    // Simulate search results with a delay
    setTimeout(() => {
        searchResults.innerHTML = `Search results for: "${searchTerm}"`;
    }, 1000);
});

    </script>
    <div class="row" style="    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    padding: 16px;
    text-align: center;
    background-color: #f1f1f1;    background-color: rgb(96 196 175);">
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
        $sql = "SELECT * FROM attend";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Retrieve the image data
          
                
		
                
        $image_data = $row['image_data'];
        $time = $row['time'];
				$event= $row['event'];
http://localhost/musicon/landing/create.php
                // Generate the HTML for each image with Bootstrap card styling
                echo '<div class="row">';
                echo  '<div class="column">';
                echo  '<div class="card">';
    echo    '<img src="data:image/jpeg;base64,' . base64_encode($image_data) . '" alt="Image" style="width:50%;height:50%"/>';
    echo     '<div class="text-wrapper-13">'.$time.'</div>';
    echo     '<h2>'.$event.'</h2>';
    echo   '</div>';
    echo   '</div>';
            }
        } else {
            echo 'No images found in the table.';
        }

        $conn->close();
        ?>
        </div>
      </div>
         <button class="btnOpen" style="background-color:#15497c">Add Events</button>
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
        <form action="add_files.php" method="POST" enctype="multipart/form-data" >
        <div class="registration-box">
            <div>
                <input type="date" 
                 name="time" required="required">
                <label>Date</label>
             </div>
    
             <div>
                <input type="text"
                  name="event" required="required">
                <label>Event</label>
             </div>
             <div>
           <input type="file" name="image" required>
               <label for ="event"></label>
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
    height: 42px;
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
    margin-top: 25px;
    padding: 10px 43px 10px 43px;
    border: none;
    border-radius: 32px;
    font-size: 20px;
    background-color: rgb(96 196 175);
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
</html>