<?php
include 'config.php'; // Include your DB connection

// Check if retailer_id is passed in the URL
if (isset($_GET['id'])) {
    $retailer_id = $_GET['id'];

    // Delete query
    $sql = "DELETE FROM retailers WHERE retailer_id = '$retailer_id'";

    if (mysqli_query($conn, $sql)) {
        echo "Retailer deleted successfully!";
        header("Location: index.php"); // Redirect back to the index page after deletion
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>