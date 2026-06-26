<?php
$servername = "localhost";
    $username = "if0_42274282";
    $password = "91KcOEpSw0Na";
    $dbname = "if0_42274282_gymx";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>