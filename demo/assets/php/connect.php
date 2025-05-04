<?php

$host = _DB_HOST;
$username = _DB_USERNAME;
$password = _DB_PASSWORD;
$database = _DB_DATABASE;

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

