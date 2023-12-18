<?php
header('Content-Type: application/json');
$server = "localhost";
$username = "root";
$pass = "";
$db = "deskhelp";
$conn = "";

$connection = new Connection($server, $username, $pass, $db);
$conn = $connection->connect();

$conn->query("INSERT INTO tags (tag_name) VALUES ('SS');");
