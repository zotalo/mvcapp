<?php

Class Administrators extends Controller {
    public function __construct(){
        
        if(!isLoggedIn() || $_SESSION['user_role_no'] != 1){
            redirect('pages/index');
        }
        $this->userModel = $this->model('Administrator');
    }

    public function index(){
        $data = [
            'title' => 'Administrator',
            'description' => 'Administrator for TEA'
        ];
        $this->view('administrators/index', $data);
    }
}