<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "chainreaction";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) === true) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS contacts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    mobile VARCHAR(50) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === true) {
    echo "Table contacts created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
