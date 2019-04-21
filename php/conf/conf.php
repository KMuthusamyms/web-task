<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="guvi";
    $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        error_reporting(0);
?>
