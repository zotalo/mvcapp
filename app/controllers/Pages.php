<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pages
 *
 * @author Administrator
 */
class Pages extends Controller{
   public function __construct() {
    $this->postModel = $this->model('Post');
   }
   
   public function index(){
       $posts = $this->postModel->getPosts();
       
       $data = [
           'title' => 'Welcome',
           'posts' => $posts
       ];
       
       
       $this->view('pages/index', $data);
   }
   public function about(){
       $data = [
           'title' => 'About'
       ];
       $this->view('pages/about', $data);
       
   }
}
