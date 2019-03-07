<?php 

Class Page {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getVersions(){
        $this->db->query('SELECT *
                        FROM versions
                        ORDER BY versionno DESC');
    $results = $this->db->resultSet();
    return $results;
    }

    public function getLastVersion(){
        $this->db->query('SELECT *
                        FROM versions
                        ORDER  BY versionno DESC
                        LIMIT 1');
        $row = $this->db->single();
        return $row;
    }
}