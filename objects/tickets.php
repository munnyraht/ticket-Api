<?php
class Tickets{
 
    // database connection and table name
    private $conn;
    private $table_name = "tickets";
 
    // object properties
    public $id;
    public $name;
    public $description;
    public $price;
    public $ticket_type_id;
    public $ticket_type_name;
    public $created;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
     // read all tickets
    function read(){
     
        // select all query
        $query = "SELECT
                    t.name as ticket_type_name, t.id, t.name, t.description, t.price, t.ticket_type_id, t.created
                FROM
                    " . $this->table_name . " t
                    LEFT JOIN
                        ticket_type tt
                            ON t.ticket_type_id = tt.id
                ORDER BY
                    t.created DESC";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        return $stmt;
    }
    function AddTicket(){
     
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name=:name, price=:price, description=:description, ticket_type_id=:ticket_type_id, created=:created";
     
        $stmt = $this->conn->prepare($query);

        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->ticket_type_id=htmlspecialchars(strip_tags($this->ticket_type_id));
        $this->created=htmlspecialchars(strip_tags($this->created));
        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":ticket_type_id", $this->ticket_type_id);
        $stmt->bindParam(":created", $this->created);
     
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    function editTicket(){
        // query to insert record
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    name=:name, price=:price, description=:description, ticket_type_id=:ticket_type_id, created=:created
                WHERE
                    id = :id";
        $stmt = $this->conn->prepare($query);
       $this->name=htmlspecialchars(strip_tags($this->name));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->ticket_type_id=htmlspecialchars(strip_tags($this->ticket_type_id));
        $this->created=htmlspecialchars(strip_tags($this->created));
        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":ticket_type_id", $this->ticket_type_id);
        $stmt->bindParam(":created", $this->created);
     
        // execute query
        if($stmt->execute()){
            return true;
        }
     
        return false;
    }
    function create(){
     
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name=:name, price=:price, description=:description, ticket_type_id=:ticket_type_id, created=:created";
        $stmt = $this->conn->prepare($query);

        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->ticket_type_id=htmlspecialchars(strip_tags($this->ticket_type_id));
        $this->created=htmlspecialchars(strip_tags($this->created));
     
        // bind values
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":ticket_type_id", $this->ticket_type_id);
        $stmt->bindParam(":created", $this->created);
     
        // execute query
        if($stmt->execute()){
            return true;
        }
     
        return false;
         
    }

}
    
class Ticket_type{

         // database connection and table name
            private $conn;
            private $table_name = "ticket_type";
         
            // object properties
            public $id;
            public $name;
            public $description;
            public $created;
         
            // constructor with $db as database connection
            public function __construct($db){
                $this->conn = $db;
             }
   
            // update the ticket type
            function updateTicket_type(){
                     
                    // update query
                    $query = "UPDATE
                                    " . $this->table_name . "
                                SET
                                    name = :name,
                                    description = :description

                                WHERE
                                    id = :id";
                     
                        // prepare query statement
                     $stmt = $this->conn->prepare($query);
                     
                        // sanitize
                    $this->name=htmlspecialchars(strip_tags($this->name));
                    $this->description=htmlspecialchars(strip_tags($this->description));
                    $this->id=htmlspecialchars(strip_tags($this->id));
                    $this->modified=htmlspecialchars(strip_tags($this->modified));
                        // bind new values
                    $stmt->bindParam(':name', $this->name);
                    $stmt->bindParam(':description', $this->description);
                    $stmt->bindParam(':id', $this->id);
                    // execute the query
                    if($stmt->execute()){
                        return true;
                    }
                        return false;
            }


                    
            function createTicket_type(){
                 
                        // query to insert record
                        $query = "INSERT INTO
                                    " . $this->table_name . "
                                SET
                                    name=:name, description=:description,created=:created";
                     
                        $stmt = $this->conn->prepare($query);

                        $this->name=htmlspecialchars(strip_tags($this->name));
                        $this->description=htmlspecialchars(strip_tags($this->description));
                        $this->created=htmlspecialchars(strip_tags($this->created));
                     
                        // bind values
                        $stmt->bindParam(":name", $this->name);
                        $stmt->bindParam(":description", $this->description);
                        $stmt->bindParam(":created", $this->created);
                     
                        // execute query
                        if($stmt->execute()){
                            return true;
                        }
                     
                        return false;
            }
        
    

}