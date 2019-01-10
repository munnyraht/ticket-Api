<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 

include_once '../config/database.php';
include_once '../objects/tickets.php';
 
$database = new Database();
$db = $database->getConnection();
 
// prepare ticket object
$ticket = new Tickets($db);
 
// get id of ticket to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ticket property values
$ticket->name = $data->name;
$ticket->price = $data->price;
$ticket->description = $data->description;
$ticket->ticket_type_id = $data->ticket_type_id;
$ticket->created = date('Y-m-d H:i:s');

// update the ticket
if($ticket->AddTicket()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "ticket was updated."));
}
 
// if unable to update the ticket, tell the user
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "Unable to update ticket."));
}
?>