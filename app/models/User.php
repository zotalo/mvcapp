<?php 
    class User{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }
        
        //Get Users
        public function getUsers(){
            $this->db->query('SELECT *, roles.rolesname 
                                FROM users
                                INNER JOIN roles
                                ON users.userrole = roles.rolesid
                                ORDER BY userid
                                ');
            $results = $this->db->resultSet();
            return $results;
        }
        //Resgister user
        public function register($data){
            $this->db->query('INSERT INTO users (username, email, userhashpass, userrole) VALUES (:name, :email, :password, :role)');
            //Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':role', 0);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        // Login User
        public function login($email, $password){
            $this->db->query('SELECT *, 
                            roles.rolesname
                            FROM users 
                            INNER JOIN roles 
                            ON users.userrole = roles.rolesid 
                            WHERE users.email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashed_password = $row->userhashpass;
            if(password_verify($password, $hashed_password)){
                return $row;
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

        // Get User by ID
    public function getUserById($id){
        
        $this->db->query('SELECT * FROM users WHERE userid = :id');
        // Bind value
        $this->db->bind(':id', $id);
  
        $row = $this->db->single();
  
        return $row;
        
      }
    }