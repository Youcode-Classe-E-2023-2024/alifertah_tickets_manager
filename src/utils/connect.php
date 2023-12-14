<?php
    $server = "localhost";
    $username = "root";
    $pass = "";
    $db = "deskhelp";
    $conn = "";

    $conn = new mysqli($server, $username, $pass, $db);
    if($conn->connect_error)
        die("Connection failed!" . $conn->connect_error);
    else 
        echo("yes");
?>