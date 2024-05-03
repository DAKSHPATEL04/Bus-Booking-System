<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bus";

// Assuming you have a variable $busid representing the bus ID
$busid = isset($_GET['busid']) ? $_GET['busid'] : null;
// echo "Received Bus ID: " . $busid; // Add this line for debugging

if ($busid === null) {
    die("Error: Bus ID is not provided");
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve values from the database that should be disabled
$disabled_values = [];
$result = $conn->query("SELECT seat FROM ticket WHERE bus_id = $busid");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $disabled_values[] = $row['seat'];
    }
}

$conn->close();

// Return the list of disabled values as a comma-separated string
echo implode(",", $disabled_values);
