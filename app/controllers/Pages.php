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
           'title' => 'Πρωτόκολλο ΤΕΑ-ΣΟΕΛ',
           'description' => 'Εφαρμογή δημιουργίας πρωτοκόλλου'
       ];
       
       
       $this->view('pages/index', $data);
   }
   public function about(){
       $data = [
           'title' => 'About',
           'description' => 'Application For TEA-SOEL Protocol'
       ];
       $this->view('pages/about', $data);
       
   }
   public function protocol(){
       $data = [
           'title' => 'Protocol',
           'description' => 'Protocol for TEA'
       ];
       $this->view('pages/protocol', $data);
   }
}
