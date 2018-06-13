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
    //   echo 'Pages loaded';
   }
   
   public function index(){
       $this->view('index');
   }
   public function about(){
       $this->view('index');
       
   }
}
