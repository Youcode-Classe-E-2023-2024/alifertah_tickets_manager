<?php
class Ticket{
    private $title;
    private $description;
    private $status;
    private $priority;
    private $conn;

    public function __construct($title, $description, $status, $priority, $conn){
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
        $this->priority = $priority;
        $this->conn = $conn;
    }

    public function newTicket(){
        $query = "INSERT INTO tickets 
        (title, description, status, priority) VALUES 
        ('$this->title', '$this->description','$this->status', '$this->priority')";
        
        if ($this->conn->query($query)) {
            echo("<script>alert('yes')</script>");
            return 1;
        } else {
            echo "ERROR: " . $query . $this->conn->error;
            return 0;
        }
    }
}