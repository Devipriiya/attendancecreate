<?php
session_start();
include('header.php');
include('../server.php');
$email=$_SESSION["email"];
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

?>
<style type="text/css">
	  .contact-form{
    background: #fff;
    margin-top: 1%;
    margin-bottom: 5%;
    width: 77%;
}
.contact-form .form-control{
    border-radius:1rem;
}
.contact-image{
    text-align: center;
}
.contact-image img{
    border-radius: 6rem;
    width: 11%;
    margin-top: -3%;
    transform: rotate(29deg);
}
.contact-form form{
    padding: 14%;
}
.contact-form form .row{
    margin-bottom: -7%;
}
.contact-form h3{
    margin-bottom: 8%;
    margin-top: -10%;
    text-align: center;
    color: #0062cc;
}
.contact-form .btnContact {
    width: 70%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: #dc3545;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    text-align: center;
    margin-left: 200px;
}
.btnContactSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    color: #fff;
    background-color: #0062cc;
    border: none;
    cursor: pointer;
}
</style>
<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Leave Requests</title>
</head>
<body>
	<?php  if ($result->num_rows > 0) {

  // output data of each row

while($row = $result->fetch_assoc())

{
 	?>
<div class="main">
	<div class="container contact-form">
  <form method="post">
                <small style="margin-left: 170px; color: darkgray;">All your messages will be send to admin directly</small>
                <h3>Leave Requests</h3>
               
               <div class="row">
               		<input type="email" name="email" value="<?php echo $row["email"] ?>" hidden>
               		<input type="text" name="fname" value="<?php echo $row["fname"] ?>" hidden>
               		<input type="text" name="lname" value="<?php echo $row["lname"] ?>" hidden>
                    <div class="col-md-6">
                           <div class="form-group">
                            <textarea name="message" required class="form-control" placeholder="Reason for leave *" style="width: 550px; height: 150px;"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit"  name="leave_req"  class="btnContact" value="Send Leave Request"/>
                        </div>
                    </div>
                </div>
            </form>
</div>

</div>
</body>
</html>
<?php

}
}
?>
