<?php
$hostname = "datasql2.westeurope.cloudapp.azure.com"; // Hostname without port
$port = 6001; // Port number
$username = "millerje"; // Replace with your MySQL username
$password = "Yz!u,zpz^S4G%RZ"; // Replace with your MySQL password
$database = "neilikka-2.0"; // Replace with your database name

// Create a connection to the MySQL database
$conn = new mysqli($hostname, $username, $password, $database, $port);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connection is successful, you can perform database operations here.

// Close the connection when done
$conn->close();
