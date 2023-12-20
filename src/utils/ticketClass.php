<?php

class Ticket{
    private $title;
    private $description;
    private $status;
    private $priority;
    private $creator;
    private $conn;
    public $ass;
    static public $imad;

    public function __construct($title, $description, $status, $priority, $conn, $creator){
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
        $this->priority = $priority;
        $this->conn = $conn;
        $this->creator = $creator;
    }

    public function newTicket($items){
     
        $query = "INSERT INTO tickets 
        (title, description, status, priority, creator) VALUES 
        ('$this->title', '$this->description','$this->status', '$this->priority', '$this->creator')";
        
        if ($this->conn->query($query)) {
            $this->insertAssignees($items,mysqli_insert_id($this->conn));
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
        while ($row = $all->fetch_assoc()) {
            $assignees = $this->getAssignees($row['id']);
            $assigneesHtml = '';
    
            foreach ($assignees as $assignee) {
                $assigneesHtml .= "<span>$assignee</span>";
            }
    
            echo("
                <div class='bg-gray-400 text-gray-700 mt-4 p-4 rounded-md shadow-md flex justify-around items-center'>
                    <p><strong>$row[title]</strong></p>
                    <p><strong>$row[status]</strong></p>
                    <p class='flex flex-col'>$assigneesHtml</p>
                    <p><strong>$row[priority]</strong></p>
                    <p><strong>$row[creator]</strong></p>
                </div>
            ");
        }
    }

    public function insertAssignees($selected,$id){
        foreach ($selected as $assignee) {
            $query = "SELECT id FROM user WHERE username = '$assignee'";
            $t = $this->conn->query($query);
            $r = mysqli_fetch_assoc($t);
            echo 'hi';
            var_dump($r);
            
            $this->conn->query("INSERT INTO ticket_user (user_id, ticket_id) VALUES ('$r[id]', '$id');");
        }
        echo json_encode(['success' => true, 'message' => 'Data processed successfully']);
    }

    public function getAssignees($id){
        $assignees = [];
        $all = $this->conn->query("SELECT user.username FROM user
        JOIN ticket_user ON user.id = ticket_user.user_id
        WHERE ticket_user.ticket_id = $id");
        while($r = $all->fetch_assoc()){
            $assignees[] = $r["username"];
        }
        return $assignees;
    }
}