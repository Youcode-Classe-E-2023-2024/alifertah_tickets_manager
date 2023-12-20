<?php
    include ("connClass.php");

    $server = "localhost";
    $username = "root";
    $pass = "";
    $db = "ticketnmanager";
    $conn = "";
    $connection = new Connection($server, $username, $pass, $db);
    $conn = $connection->connect();
    if($conn->connect_error)
        die("Connection failed!" . $conn->connect_error);
?>