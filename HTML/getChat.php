<?php
// Connect to the database
$host = "localhost";
$user = "root";
$pass = "";
$db = "chatbox";

$conn = mysqli_connect($host, $user, $pass, $db);

// Get the chat log
$query = "SELECT * FROM messages ORDER BY id DESC LIMIT 50";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
	echo "<p><strong>" . $row['user'] . ":</strong> " . $row['message'] . "</p>";
}
?>
