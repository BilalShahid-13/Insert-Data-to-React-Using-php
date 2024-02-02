//Firstly open your local server like xammpp then copy path like http://localhost/abc/insert.php abc is mine folder where my insert.php means this file is running in local server
// if you have any query or porblems then do let me know
<?php

header('Access-Control-Allow-Origin');
// its my current locahost port when i run my npm start command
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
// connetion
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "abc";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo 'console.log(mysqli_connect_error)';
    exit;
} else {
    if (isset($_POST['submit'])) {
        $name = $_POST['username'];
        $email = $D_POST['pass'];
// reg is table
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
