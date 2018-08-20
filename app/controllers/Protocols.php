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

    public function add(){
        //Get Protocols
        $data = [

        ];
        $this->view('protocols/add', $data);
    }

    public function show($id){
        //Show Protocol
        $protocol = $this->protocolModel->getProtocolById($id);
        $user = $this->userModel->getUserById($protocol->protocolUser);

        $data = [
            'protocol' => $protocol,
            'user' => $user
        ];
        $this->view('protocols/show', $data);
    }
}