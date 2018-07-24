<?php 
    class Post{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getPosts(){
            $this->db->query('SELECT *,
                            posts.id as postId,
                            users.userid as userId,
                            posts.created as postCreated,
                            users.userlog as userCreated
                             FROM posts
                             INNER JOIN users
                             ON posts.user_id = users.userid
                             ORDER BY posts.created DESC
                             ');

            $results = $this->db->resultSet();

            return $results;
        }
    }