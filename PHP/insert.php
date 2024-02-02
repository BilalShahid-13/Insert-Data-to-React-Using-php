<?php

// Enable CORS headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Database connection details
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'abc';

// Establish a database connection
$conn = new mysqli($host, $user, $pass, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the expected POST parameters are set
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Retrieve data from the POST request
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Perform the database insertion (replace this with your actual code)
        $sql = "INSERT INTO reg (username, password) VALUES ('$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            // Return a success message
            echo 'console.log(succed)';
            // echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully']);
        } else {
            // Return an error message
            echo json_encode(['status' => 'error', 'message' => $conn->error]);
        }
    } else {
        // Return an error if expected POST parameters are not set
        echo json_encode(['status' => 'error', 'message' => 'Missing POST parameters']);
    }
} else {
    // Return an error for non-POST requests
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

// Close the database connection
$conn->close();

?>
