<?php

Class Administrator {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
}