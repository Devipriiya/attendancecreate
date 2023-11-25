<?php
// edit_row_form.php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch row data from the database based on the ID
    // Display a form with pre-filled data for editing

    // Example form structure
    echo '<form action="update_row.php" method="post">';
    echo '<input type="hidden" name="id" value="' . $id . '">';
    echo '<label for="code">Course Code:</label>';
    echo '<input type="text" name="code" value="' . $code . '"><br>';
    // Add similar lines for other fields
    echo '<input type="submit" value="Update">';
    echo '</form>';
}
?>
