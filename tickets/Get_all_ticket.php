<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/tickets.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$tickets = new Tickets($db);
 
// query tickets
$stmt = $tickets->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // tickets array
    $ticket_arr=array();
    $ticket_arr["records"]=array();
 
    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        extract($row);
        $ticket_item=array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "ticket_type_id" => $ticket_type_id,
            "ticket_type_name" => $ticket_type_name
        );
 
        array_push($ticket_arr["records"], $ticket_item);
    }
    // set response code - 200 OK
    http_response_code(200);
 
    // show tickets data in json format
    echo json_encode($ticket_arr);
}
 
// no tickets found will be here
else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}