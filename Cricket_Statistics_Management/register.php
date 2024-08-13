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

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare SQL statement to insert data into database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: Homepage.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
    <script>
        // Check if registration was successful
        <?php
        session_start();
        if (isset($_SESSION["registration_success"]) && $_SESSION["registration_success"] === true) {
            // Display prompt
            echo 'alert("New record created successfully");';
            // Unset the session variable to avoid displaying the prompt again on subsequent page loads
            unset($_SESSION["registration_success"]);
        }
        ?>
    </script>
