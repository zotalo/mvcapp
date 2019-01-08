<?php

Class Administrator {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    
    public function getRoles(){
        $this->db->query('SELECT *
                        FROM roles
                        order by rolesid');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getStatus(){
        $this->db->query('SELECT *
                        FROM status');
        $results = $this->db->resultSet();
        return $results;
    }
}