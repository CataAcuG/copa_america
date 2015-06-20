<?php
$config = parse_ini_file('../config.ini');

// Create connection
$conn = new mysqli($config['host'], $config['username'], $config['passwd'], $config['dbname']);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
echo 'Connected successfully';