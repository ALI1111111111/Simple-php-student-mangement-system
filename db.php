<?php
/**
 * Run this script once to create the database and table.
 */

$host = 'localhost';
$user = 'root';
$password = '';

$mysqli = new mysqli($host, $user, $password);
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Create database
$mysqli->query('CREATE DATABASE IF NOT EXISTS student_db');
$mysqli->select_db('student_db');

// Create table
$createTable = "CREATE TABLE IF NOT EXISTS student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    gender ENUM('Male', 'Female') NOT NULL,
    course VARCHAR(100) NOT NULL
)";

if (!$mysqli->query($createTable)) {
    die('Table creation failed: ' . $mysqli->error);
}

echo "Database and table setup completed.";
?>
