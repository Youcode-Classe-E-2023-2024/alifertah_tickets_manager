<?php
class User{
        private $username;
        private $email;
        private $password;
        public $conn;
    public function __construct($username, $email, $password, $conn){
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->conn = $conn;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
         $this->password;
    }

    public function register(){
        $query = "INSERT INTO user
        (`username`, `password`, `email`)
            VALUES
        ('$this->username', '$this->password', '$this->email')";
        if ($this->conn->query($query)) {
            echo("<script>alert('yes')</script>");
            return 1;
        } else {
            echo "ERROR: " . $query . $this->conn->error;
            return 0;
        }
    }
}
?>