<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Post
 *
 * @author Administrator
 */
class Post {
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }
}
