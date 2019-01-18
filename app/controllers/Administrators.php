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
            'title'=> 'Χρήστες του Συστήματος',
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

    public function edit($id){
        $users = $this->userModel->getUserInfo($id);

        $data = [
            'title' => 'Επεξεργασία Χρήστη',
            'users' => $users,
        ];
        $this->view('administrators/edit', $data);
    }
}