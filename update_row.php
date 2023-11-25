<?php
// update_row.php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $code = $_POST['code'];
    // Add similar lines for other fields

    // Query to update the row data in the database
    // Perform the update operation here

    // Redirect back to the page after update
    header("Location: form.php");
    exit();
}
?>
