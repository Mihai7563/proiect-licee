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

// Setează charset-ul la UTF-8 (ideal utf8mb4 pentru diacritice și emoji)
$conn->set_charset("utf8mb4");

// Opțional, trimite și header-ul pentru browser, ca să afișeze corect textul
header('Content-Type: text/html; charset=utf-8');

