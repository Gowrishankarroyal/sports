<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$db="slot_book";
// Create connection
$mysqli = new mysqli($servername, $username, $password,$db);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>