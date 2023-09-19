<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sakila";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Yhteys epäonnistui: " . $conn->connect_error);
}

// Lue ja suorita SQL-tiedostot
$sql_schema = file_get_contents("sakila-schema.sql");
$sql_data = file_get_contents("sakila-data.sql");

if ($conn->multi_query($sql_schema) && $conn->multi_query($sql_data)) {
    echo "Tiedostojen tuonti onnistui.";
} else {
    echo "Tiedostojen tuonti epäonnistui: " . $conn->error;
}

$conn->close();
