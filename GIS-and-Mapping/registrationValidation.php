<?php
include "config/dbcon.php";
require 'vendor/autoload.php';

use Ramsey\Uuid\Uuid; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user input
    $firstname = mysqli_real_escape_string($conn, $_POST['Firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['MiddleName']);
    $lastname = mysqli_real_escape_string($conn, $_POST['Lastname']);
    $birthday = mysqli_real_escape_string($conn, $_POST['Birthday']);
    $username = mysqli_real_escape_string($conn, $_POST['Username']);
    $password = mysqli_real_escape_string($conn, $_POST['Password']);
    $role = mysqli_real_escape_string($conn, $_POST['Role']);

    // Check if the username already exists (optional)
    $checkUsername = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($checkUsername);

    if ($result->num_rows > 0) {
        echo "Username already exists. Please choose a different username.";
    } else {
        // Generate a UUID as a unique ID
        $uuid = Uuid::uuid4()->toString();

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // SQL query to insert user data into the database
        $sql = "INSERT INTO users (id, firstname, middlename, lastname, username, password, birthday, role) 
                VALUES ('$uuid', '$firstname', '$middlename', '$lastname', '$username', '$hashedPassword', '$birthday', '$role')"; 

        if ($conn->query($sql) === TRUE) {  
            echo "Registration successful!";
            header('Location: index.php');
            exit(); // Exit to prevent further execution
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    echo "Invalid request method. Please use a POST request for registration.";
}

// Close the database connection
$conn->close();
?>

