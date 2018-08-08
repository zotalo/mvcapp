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
    if(!isLoggedIn()){
        redirect('users/login');
    }
   }
   
   public function index(){
    
       
       $data = [
           'title' => 'ΤΕΑ-ΣΟΕΛ',
           'description' => 'Εφαρμογή διαχείρισης'
       ];
       
       
       $this->view('pages/index', $data);
   }
   public function about(){
       $data = [
           'title' => 'About',
           'description' => 'Application For TEA-SOEL'
       ];
       $this->view('pages/about', $data);
       
   }
   
}
