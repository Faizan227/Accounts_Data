<?php

    // Handle form submission
    
    // Connect to your database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "accounts_data";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
?>
