<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "gsfcuniversity";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'] ?? '';
$password = $_POST['password'] ?? '';

if (isset($_POST['checkbox'])) {
    $checkbox = "Yes";
} else {
    $checkbox = "No";
}

$sql = "INSERT INTO `user` (`name`, `password`, `checkbox`)
        VALUES ('$name', '$password', '$checkbox')";

if ($conn->query($sql) === TRUE) {

    echo "New data created successfully.<br>";
    echo "<a href='day1.html'>Go Back</a>";

} else {

    echo "Error: " . $conn->error;
}

$conn->close();

?>