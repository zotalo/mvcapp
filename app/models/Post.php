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
                             ON posts.userId = users.userid
                             ORDER BY posts.created DESC
                             ');

            $results = $this->db->resultSet();

            return $results;
        }

        public function addPost($data){
            $this->db->query('INSERT INTO posts (title, userId, body) VALUES (:title, :userId, :body)');
            //Bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);
            $this->db->bind(':userId', $data['userId']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        public function getPostById($id){
            $this->db->query('SELECT * FROM posts WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();
            return $row;
        }
    }