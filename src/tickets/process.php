<?php
session_start();
include ("../utils/connect.php");
include ("../utils/ticketClass.php");
header('Content-Type: application/json');
$server = "localhost";
$username = "root";
$pass = "";
$db = "ticketnmanager";
$conn = "";

$connection = new Connection($server, $username, $pass, $db);
$conn = $connection->connect();

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

if (isset($input['items'])) {
    $tck = new Ticket("", "", "", "", $conn, "");
    $selectedAssignees = $input['items'];
    
    $_SESSION["imad"] = $input['items'];
    // $tck->insertAssignees($selectedAssignees);
    // $conn->query("INSERT INTO ticket_user (user_id, ticket_id) VALUES (1, 2);");
}
else {
    echo json_encode(['success' => false, 'message' => 'Invalid data format']);
}