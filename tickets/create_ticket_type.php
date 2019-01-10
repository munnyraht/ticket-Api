<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate ticket object
include_once '../objects/tickets.php';
 
$database = new Database();
$db = $database->getConnection();
 
$ticket_type = new Ticket_type($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"),true);
 
// make sure data is not empty
if(
    !empty($data->name) &&
    !empty($data->description)
){
 
    // set ticket_type property values
    $ticket_type->name = $data->name;
    $ticket_type->description = $data->description;
    $ticket_type->created = date('Y-m-d H:i:s');
    
    // create the ticket_type
    if($ticket_type->createTicket_type()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "ticket_type was created."));
    }
 
    // if unable to create the ticket_type, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create ticket_type."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create ticket_type. Data is incomplete."));
}
?>