<?php
$host = 'localhost';
$user = 'root';
$pass = '12345'; // Your MySQL password
$dbname = 'mydatabase';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>