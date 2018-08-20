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
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'subject'=> trim($_POST['subject']),
                'pdate'=> trim($_POST['pdate']),
                'description'=> trim($_POST['description']),
                'fromto' => trim($_POST['fromto']),
                'nodoc' => trim($_POST['nodoc']),
                'idate' => trim($_POST['idate']),
                'file' => trim($_POST['file']),
                'userId' => $_SESSION['user_id'],
                'subject_err' => '',
                'pdate_err' => '',
                'fromto_err' => '',
                'nodoc_err' => '',
                'idate_err' => '',
                'file_err' => ''
            ];
        
        
    } else {
        $data = [
            'subject'=> '',
            'pdate'=> '',
            'description'=> '',
            'fromto'=> '',
            'nodoc'=> '',
            'idate'=> '',
            'file'=> '',
        ];
        $this->view('protocols/add', $data);
        }
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