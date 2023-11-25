<?php
include('header.php');
include('../server.php');
session_start();
$admin_email=$_SESSION["admin_email"];
if($admin_email!="admin@admin.com")

{
   header("Location: login.php");
}
else 
{
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>User View</title>

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

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
    $sql = "SELECT * FROM leave_requests";
$result = $conn->query($sql);

?>
   
<div class="main">
	<div class="data">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="10%;">Email</th>
                <th>Message</th>
                <th width="10%;">Date</th>
                <th width="15%;">Approve</th>
                <th width="15%;">Reject</th>

            </tr>
        </thead>
        <tbody>
            <?php 
            if ($result->num_rows > 0) {

  // output data of each row

while($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php  echo $row["email"]  ?></td>
                <td><?php  echo $row["message"]?></td>
                <td><?php  echo $row["date_time"] ?></td>
                 <td><form method="post"> <input type="text" name="email" value="<?php echo $row["email"] ?>" hidden><input type="text" name="date" value="<?php echo $row["date_time"] ?>" hidden>
                    <input type="text" name="fname" value="<?php echo $row["fname"] ?>" hidden>
                    <input type="text" name="lname" value="<?php echo $row["lname"] ?>" hidden>
                    <button class="btn btn-outline-success" name="approve_leave">Approve Leave</button></form></td>
                <td><form method="post"> <input type="text" name="email" value="<?php echo $row["email"] ?>" hidden><input type="text" name="date" value="<?php echo $row["date_time"] ?>" hidden>
                     <input type="text" name="fname" value="<?php echo $row["fname"] ?>" hidden>
                    <input type="text" name="lname" value="<?php echo $row["lname"] ?>" hidden>
                    <button class="btn btn-outline-danger" name="reject_leave">Reject Leave</button></form></td>
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
<?php

    }

?>