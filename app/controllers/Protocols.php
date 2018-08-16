<?php

Class Protocols extends Controller {
    public function __construct(){
        
        if(!isLoggedIn() || $_SESSION['user_role_no'] > 2){
            redirect('pages/index');
        }
        if($_SESSION['user_role_no'] == 0){
            redirect('users/wait');
        }
        $this->protocolModel = $this->model('Protocol');
        $this->userModel = $this->model('User');
    }

    public function index(){
        //Get Protocols
        $protocols = $this->protocolModel->getProtocols();
        $data = [
            'protocols' => $protocols,
        ];
        $this->view('protocols/index', $data);
    }

}