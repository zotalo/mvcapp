<?php

Class Protocols extends Controller {
    public function __construct(){
        
        if(!isLoggedIn() || $_SESSION['user_role_no'] > 2){
            redirect('pages/index');
        }
        $this->protocolModel = $this->model('Protocol');
        $this->userModel = $this->model('User');
    }

    public function index(){
        $data = [
            'title' => 'Protocol',
            'description' => 'Protocol for TEA'
        ];
        $this->view('protocols/index', $data);
    }

}