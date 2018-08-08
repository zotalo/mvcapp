<?php

Class Protocol extends Controller {
    public function __construct(){
        
        if(!isLoggedIn() || $_SESSION['user_role_no'] > 2){
            redirect('pages/index');
        }
       // $this->userModel = $this->model('Protocol');
    }

    public function index(){
        $data = [
            'title' => 'Protocol',
            'description' => 'Protocol for TEA'
        ];
        $this->view('protocol/index', $data);
    }
}