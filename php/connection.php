<?php
    /*//server
    $host = "us-cdbr-azure-west-b.cleardb.com";
    $user = "b619a5cf6e68dd";
    $pass = "e0153e39";
    $database = "loker";

    $connection = mysqli_connect($host, $user, $pass, $database);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }*/

    //lokal server
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "new_atol";

    $connection = mysqli_connect($host, $user, $pass, $database);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>