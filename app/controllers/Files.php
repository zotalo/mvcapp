<?php

Class Files extends Controller {
    public function __construct(){
        if(!isLoggedIn()){
            redirect('users/login');
        }
        $this->fileModel = $this->model('File');
        $this->protocolModel = $this->model('Protocol');

    }

    public function index(){
        
        $files = $this->fileModel->getFiles();
        $data = [
            'files' => $files,
        ];
        $this->view('files/index', $data);
    }
}