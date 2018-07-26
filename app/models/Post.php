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

        public function addPost($data){
            $this->db->query('INSERT INTO posts (title, user_id, body) VALUES (:title, :user_id, :body)');
            //Bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);
            $this->db->bind(':user_id', $data['user_id']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }