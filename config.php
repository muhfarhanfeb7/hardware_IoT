<?php
    $host       = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "rsxms_project_sensor";

    $conn         = mysqli_connect($host, $username, $password, $dbname);
    if (!$conn) {
        echo "Database Error";
    } 
?>