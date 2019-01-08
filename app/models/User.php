<?php 
    class User{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }
        
        //Get Users
        public function getUsers(){
            $this->db->query('SELECT *, roles.rolesname, status.statusDescription 
                                FROM users
                                INNER JOIN roles
                                ON users.userrole = roles.rolesid
                                INNER JOIN status
                                ON users.userStatus = status.statusId
                                ORDER BY userId
                                ');
            $results = $this->db->resultSet();
            return $results;
        }
        //Resgister user
        public function register($data){
            $this->db->query('INSERT INTO users (userName, email, userHashPass, userRole, userStatus) VALUES (:name, :email, :password, :role, :status)');
            //Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':role', $data['roles']);
            $this->db->bind(':status', $data['statuses']);

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
                            ON users.userRole = roles.rolesid 
                            WHERE users.email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashed_password = $row->userHashPass;
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
        
        $this->db->query('SELECT * FROM users WHERE userId = :id');
        // Bind value
        $this->db->bind(':id', $id);
  
        $row = $this->db->single();
  
        return $row;
        
      }

      public function getUserInfo($id){
          $this->db->query(
              'SELECT *, roles.rolesDescription, status.statusDescription
              FROM users
              INNER JOIN roles 
              ON users.userRole = roles.rolesId
              INNER JOIN status
              ON users.userStatus = status.statusId
              WHERE userId = :id'
          );
          $this->db->bind(':id', $id);
          
          $row = $this->db->single();
          return $row;
      }

      //Change Password
      public function changePassword($id, $password){
          $this->db->query('UPDATE users SET userHashPass = :newpass WHERE userId = :id');
          //Bind Values
          $this->db->bind(':id', $id);
          $this->db->bind(':newpass', $password);
           //Execute
           if($this->db->execute()){
            return true;
        } else {
            return false;
        }
      }

      //Verify OldPassword
      public function verifyPassword($id, $password){
        $this->db->query('SELECT userHashPass
                        FROM users 
                        WHERE userId = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        $hashed_password = $row->userHashPass;
        if(password_verify($password, $hashed_password)){
            return true;
        } else {
            return false;
        }
    }
    }