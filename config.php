<?php
    $host       = "";
    $username   = "";
    $password   = "";
    $dbname     = "";

    $conn         = mysqli_connect($host, $username, $password, $dbname);
    if (!$conn) {
        echo "Database Error";
    } 
?>
