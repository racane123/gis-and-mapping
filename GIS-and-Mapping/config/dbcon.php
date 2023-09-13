<?php
require_once 'config.php';

// Create the database connection
$conn = new mysqli($db_servername, $db_username, $db_password, $db_database);

// Check the Connection
if ($conn->connect_error) {
    // Log the error securely and display a generic error message to the user
    error_log("Connection failed: " . $conn->connect_error);
    die("Oops! Something went wrong. Please try again later.");
}

?>