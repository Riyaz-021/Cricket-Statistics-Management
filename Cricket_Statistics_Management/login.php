<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "root";
$database = "DBMSPROJECT";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare SQL statement to fetch user data
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    
    // Execute SQL statement
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful, redirect to homepage
        session_start();
        $_SESSION["loggedin"] = true;
        header("Location: Homepage.html");
        exit();
    } else {
        // Login failed, redirect back to login page with error message
        header("Location: login.html?error=1");
        exit();
    }
}

// Close database connection
$conn->close();
?>
