<?php

class Pages extends Controller{
   public function __construct() {
    if(!isLoggedIn()){
        redirect('users/login');
    }
    else if($_SESSION['user_role_no'] == 0){
        redirect('users/wait');
    }
    $this->pageModel = $this->model('Page');
   }
   
   public function index(){
    
       
       $data = [
           'title' => 'ΤΕΑ-ΣΟΕΛ',
           'description' => 'Εφαρμογή διαχείρισης'
       ];
       
       
       $this->view('pages/index', $data);
   }
   public function about(){
       $lastversion = $this->pageModel->getLastVersion();
       $data = [
           'title' => 'Σχετικά',
           'description' => 'Εφαρμογή για το πρωτόκολλο ΤΕΑ-ΣΟΕΛ',
           'lastversion' => $lastversion,
       ];
       $this->view('pages/about', $data);
       
   }

   public function versions(){
       $versions = $this->pageModel->getVersions();
       $data = [
           'title' => 'Εκδόσεις',
           'description' => 'Ιστορικό Εκδόσεων',
           'versions' => $versions
       ];
       $this->view('pages/versions', $data);
   }
   
}
