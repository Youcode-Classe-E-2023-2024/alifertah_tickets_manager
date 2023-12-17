<?php
class Ticket{
    private $title;
    private $description;
    private $status;
    private $priority;
    private $creator;
    private $conn;

    public function __construct($title, $description, $status, $priority, $conn, $creator){
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
        $this->priority = $priority;
        $this->conn = $conn;
        $this->creator = $creator;
    }

    public function newTicket(){
        $query = "INSERT INTO tickets 
        (title, description, status, priority, creator_id) VALUES 
        ('$this->title', '$this->description','$this->status', '$this->priority', '$this->creator')";
        
        if ($this->conn->query($query)) {
            echo("<script>alert('yes')</script>");
            return 1;
        } else {
            echo "ERROR: " . $query . $this->conn->error;
            return 0;
        }
    }
}