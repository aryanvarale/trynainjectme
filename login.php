<?php
// Connect to the database
$conn = new mysqli("localhost", "id22333616_root", "Root@1234", "id22333616_ctf");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form (without sanitizing)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Construct the SQL query directly (Unsafe, for demonstration purposes only)
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    // Execute the SQL query
    $result = $conn->query($sql);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // If the user exists, redirect to home.html
        header("Location: home.html");
        exit;
    } else {
        // If the user does not exist, redirect back to the login page with an error message
        $error = "Invalid username or password.";
        header("Location: index.html?error=" . urlencode($error));
        exit;
    }
}

// Close the connection
$conn->close();
?>
