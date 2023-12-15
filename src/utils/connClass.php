<?php 
    class Connection{
        private $server;
        private $user;
        private $pass;
        private $db;
        private $conn;

        public function __construct($server, $user, $pass, $db){
            $this->server = $server;
            $this->user = $user;
            $this->pass = $pass;
            $this->db = $db;

        }

        public function connect(){
            $this->conn = new mysqli($this->server, $this->user, $this->pass,
                $this->db);
            return $this->conn;
        }
    }
?>