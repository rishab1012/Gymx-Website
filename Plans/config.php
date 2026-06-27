<?php        
        $servername = "sql312.infinityfree.com";
        $username = "if0_42274282";
        $password = "Gymx2026pass";
        $database = "if0_42274282_gymx";

        $connection = new mysqli($servername, $username, $password, $database);

        if ($connection->connect_error) {
            die("Connection Failed : " . $connection->connect_error);
}
?>