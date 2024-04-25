<?php
    $host = 'localhost';
    $dbname = 'sekolah';
    $username = 'root';
    $password = '';

    $conn = new mysqli ($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }
?>