<?php
// Connecting to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "bus";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Getting user message through AJAX
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

// Checking user query against database query
$check_query = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$result = mysqli_query($conn, $check_query);

// Check if there are matching rows in the database
if (mysqli_num_rows($result) > 0) {
    // Fetching reply from the database according to the user query
    $row = mysqli_fetch_assoc($result);
    // Storing reply in a variable which will be sent back via AJAX
    $reply = nl2br($row['replies']); // Add line breaks for each new line in the stored data
    echo $reply;
} else {
    echo "Sorry, I can't understand you!";
}

// Close the database connection
mysqli_close($conn);
?>
