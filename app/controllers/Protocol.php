<?php

class Protocol extends Controller {
    public function __construct(){
        
        if(!isLoggedIn()){
            redirect('users/login');
        }
        $this->userModel = $this->model('Protocol');
    }

    public function index(){
        $data = [
            'title' => 'Protocol',
            'description' => 'Protocol for TEA'
        ];
        $this->view('protocol/index', $data);
    }
}