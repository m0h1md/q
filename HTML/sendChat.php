<?php
// Connect to the database
$host = "localhost";
$user = "root";
$pass = "";
$db = "chatbox";

$conn = mysqli_connect($host, $user, $pass, $db);

// Insert the new message
$message = $_POST['message'];
$user = $_POST['user'];

$query = "INSERT INTO messages (user, message) VALUES ('$user', '$message')";
mysqli_query($conn, $query);
?>
