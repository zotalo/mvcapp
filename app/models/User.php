<?php 
    class User{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        //Resgister user
        public function register($data){
            $this->db->query('INSERT INTO users (username, email, userhashpass, userrole) VALUES (:name, :email, :password, :role)');
            //Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':role', 1);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        // Find user by email
        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            //Bind value
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            //Check row

            if($this->db->rowCount() > 0){
                return true;
            }
            else {
                return false;
            }
        }
    }