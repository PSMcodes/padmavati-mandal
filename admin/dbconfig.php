<?php
// Database configuration settings
$servername = "localhost"; // Database server (usually 'localhost')
$username = "root";        // Your database username (e.g., 'root')
$password = "";            // Your database password (leave empty if not set)
$dbname = "u912243786_padmavati"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>