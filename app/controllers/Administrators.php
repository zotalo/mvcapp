<?php

Class Administrators extends Controller {
    public function __construct(){
        
        if(!isLoggedIn() || $_SESSION['user_role_no'] != 1){
            redirect('pages/index');
        }
        $this->administratorModel = $this->model('Administrator');
        $this->userModel = $this->model('User');
    }

    public function index(){
        $data = [
            'title' => 'Administrator',
            'description' => 'Administrator for TEA'
        ];
        $this->view('administrators/index', $data);
    }

    public function users(){
        $users = $this->userModel->getUsers();

        $data = [
            'users'=> $users,

        ];
        $this->view('administrators/users', $data);
    }

    public function show($id){
        $users = $this->userModel->getUserInfo($id);

        $data = [
            'title' => 'Πληροφορίες Χρήστη',
            'users' => $users,
        ];
        $this->view('administrators/show', $data);
    }
}