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
        // echo $this->priority;
        // die();
        $query = "INSERT INTO tickets 
        (title, description, status, priority, creator) VALUES 
        ('$this->title', '$this->description','$this->status', '$this->priority', '$this->creator')";
        
        if ($this->conn->query($query)) {
            return 1;

        } else {
            echo "ERROR: " . $query . $this->conn->error;
            return 0;
        }
    }

    public function getAllDevs(){
        $all = $this->conn->query("SELECT * FROM user");
        while($r = $all->fetch_assoc()){
            echo("
            <option class='assigneeSelect' >$r[username]</option>
            ");
        }
    }
    public function getAllTickets(){
        $all = $this->conn->query("SELECT * FROM tickets");
        while($r = $all->fetch_assoc()){
            echo("
            <div class='bg-gray-400 text-gray-700 mt-4 p-4 rounded-md shadow-md flex justify-around items-center'>
                <p><strong>$r[title]</strong></p>
                <p><strong>$r[status]</strong></p>
                <p><strong>ASSIGNEES</strong></p>
                <p><strong>$r[priority]</strong></p>
            </div>
            ");
        }
    }

    public function insertAssignees($selected){
        foreach ($selected as $assignee) {
            $this->conn->query("INSERT INTO ticket_user (user_id, ticket_id) VALUES (2, 4);");
        }
        echo json_encode(['success' => true, 'message' => 'Data processed successfully']);
    } 
}