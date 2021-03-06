<?php

class Pages extends Controller{
   public function __construct() {
    if(!isLoggedIn()){
        redirect('users/login');
    }
    else if($_SESSION['user_role_no'] == 0){
        redirect('users/wait');
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
           'title' => 'Σχετικά',
           'description' => 'Εφαρμογή για το πρωτόκολλο ΤΕΑ-ΣΟΕΛ'
       ];
       $this->view('pages/about', $data);
       
   }
   
}
