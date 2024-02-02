<?php

header('Access-Control-Allow-Origin');
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$conn = mysqli_connect("localhost", "root", "", "abc");
if ($conn->connect_error) {
    echo 'console.log(mysqli_connect_error)';
    exit;
} else {
    if (isset($_POST['submit'])) {
        $name = $_POST['username'];
        $email = $D_POST['pass'];

        $sql = "INSERT INTO reg VALUES ('','$name', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();


}

?>