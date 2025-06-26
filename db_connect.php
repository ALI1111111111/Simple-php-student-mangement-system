<?php
/**
 * Database connection using mysqli.
 * Update the credentials as per your environment.
 */

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'student_db';

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
?>
