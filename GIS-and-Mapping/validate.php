<?php
session_start();

include 'config/dbcon.php';

function sanitize($input)
{
    global $conn;
    return $conn->real_escape_string($input);
}

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: admindashboard.php"); // Redirect to dashboard if already logged in
    exit();
}

// Login Logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitize($_POST['Username']);
    $password = $_POST['Password'];

    // Check if the user is a regular user
    $userQuery = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($userQuery);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $userResult = $stmt->get_result();

    if ($userResult->num_rows === 1) {
        $row = $userResult->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Store user information in session variables
            $_SESSION['username'] = $row['username'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['middlename'] = $row['middlename'];
            $_SESSION['role'] = $row['role'];

            if ($row['role'] === 'user') {
                header("Location: userpage.php");
                exit();
            } elseif ($row['role'] === 'admin') {
                header("Location: admindashboard.php");
                exit();
            } elseif ($row ['role'] === 'lgu'){
                header("Location: lgupage.php");
            }

        }
    }

    // Display alert and redirect to login page
    echo '<script>alert("Invalid username or password"); window.location.href = "index.php";</script>';
    exit();
}
?>