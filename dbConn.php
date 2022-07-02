<?php
    // Database configuration
    $servername     = "localhost";
    $username = "qrcdr";
    $password = "qrcdr@22222";
    $dbName     = "qrcdr";

    $db = new mysqli($servername, $username, $password,  $dbName);

    if (!$db) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        exit;
    }
?>