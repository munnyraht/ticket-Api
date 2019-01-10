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
 
// prepare ticket_type object
$ticket_type = new Ticket_type($db);
 
// get id of ticket_type to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of ticket_type to be edited
$ticket_type->id = $data->id;
 
// set ticket_type property values
$ticket_type->name = $data->name;
$ticket_type->description = $data->description;

// update the ticket_type
if($ticket_type->updateTicket_type()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "ticket_type was updated."));
}
 
// if unable to update the ticket_type, tell the user
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "Unable to update ticket_type."));
}
?>