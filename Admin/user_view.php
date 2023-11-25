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
<body>
    <div class="main"> 
<!-- <div class="jumbotron">
  <h1 class="display-4">User Management</h1>
  <p class="lead">From Here you can add the new Students.</p>
  <hr class="my-4">
   <div class="d-flex justify-content-center" style="margin-top: 30px;">
  <p>Feel Free to add the new students . Just click on the button below to add the new student</p>
  </div> -->
  <h2>Students List</h2>
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
		margin-left: 14px;
	}
</style>
<body>
  <?php
    $date = date('Y-m-d'); // Get the current date in 'YYYY-MM-DD' format

    // $sql = "SELECT * FROM presentdetails WHERE date = '$date'";
    $sql = "SELECT lc.batch, cc.name, cc.present, cc.date FROM presentdetails cc INNER JOIN studenttable lc ON cc.name = lc.name WHERE date = '$date'";
    
$result = $conn->query($sql);

?>
   
<div class="main">
    <button style="float: right; margin-right: 12px;border-color:rgb(96 196 175);background-color:rgb(96 196 175);" class="btn btn-primary my-2 my-sm-0" onclick="exportToExcel('dataTable', 'user-data')"><i class="fas fa-download"></i> Generate Report</button> <br><br>
	<div class="data">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <!-- <th>Email</th> -->
                <th>Add Date</th>
                <th>Course</th>
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

