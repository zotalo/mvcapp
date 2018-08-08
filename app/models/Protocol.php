<?php
    Class Protocol {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }
    }