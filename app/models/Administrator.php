<?php

Class Administrator {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    
    public function getRoles(){
        $this->db->query('SELECT *
                        FROM roles
                        ORDER BY rolesid');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getStatus(){
        $this->db->query('SELECT *
                        FROM status');
        $results = $this->db->resultSet();
        return $results;
    }

    public function updateUserPassword($id, $password){
        $this->db->query('UPDATE users
                        SET userHashPass = :hashedPass
                        WHERE userid = :userid
        ');
        //Bind Values
        $this->db->bind(':hashedPass', $password);
        $this->db->bind(':userid', $id);
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}