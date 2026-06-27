<?php
$servername = "sql312.infinityfree.com";
    $username = "if0_42274282";
    $password = "Gymx2026pass";
    $dbname = "if0_42274282_gymx";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>