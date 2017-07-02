<?php
    /*$host = "localhost";
    $user = "root";
    $pass = "";
    $database = "db_lowker";
    
    $connection = mysqli_connect($host, $user, $pass, $database);
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }*/

    //Azure Connection
    // PHP Data Objects(PDO) Sample Code:
    try {
        $conn = new PDO("sqlsrv:server = tcp:lowker.database.windows.net,1433; Database = lowker", "admin1", "{Admin4241622}");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        print("Error connecting to SQL Server.");
        die(print_r($e));
    }

    // SQL Server Extension Sample Code:
    $connectionInfo = array("UID" => "admin1@lowker", "pwd" => "{Admin4241622}", "Database" => "lowker", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
    $serverName = "tcp:lowker.database.windows.net,1433";
    $conn = sqlsrv_connect($serverName, $connectionInfo);
?>