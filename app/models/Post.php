<?php 
    class Post{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getPost(){
            $this->db->query('SELECT * FROM posts');

            $results = $this->db->resultSet();

            return $results;
        }
    }