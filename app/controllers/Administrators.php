<?php

Class Administrators extends Controller {
    public function __construct(){
        
        if(!isLoggedIn() || $_SESSION['user_role_no'] != 1){
            redirect('pages/index');
        }
        $this->administratorModel = $this->model('Administrator');
        $this->userModel = $this->model('User');
        $this->pageModel = $this->model('Page');
    }

    public function index(){
        $data = [
            'title' => 'Διαχειριστής Συστήματος',
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
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
            'role' => trim($_POST['role']),
            'status' => trim($_POST['status']),
            'email' => trim($_POST['email']),
            'email_err' => '',
            ];
        } else {
        $roles = $this->administratorModel->getRoles();
        $status = $this->administratorModel->getStatus();   
        $data = [
            'title' => 'Επεξεργασία Χρήστη',
            'users' => $users,
            'role' => $roles,
            'status'=> $status
        ];
        $this->view('administrators/edit', $data);
        }
    }
    public function reset($id){
        $users = $this->userModel->getUserInfo($id);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'resetPass' => generatePassword(),
                'id' => $id,
                'resetPassHash' => '',
            ];
            //Hash Password
            $data['resetPassHash'] = password_hash($data['resetPass'], PASSWORD_DEFAULT);

            if($this->administratorModel->updateUserPassword($data['id'], $data['resetPassHash'])){
                flash('administrator_message', $data['resetPass']);
                redirect('administrators/show/'.$id);
            } else {
                die('Something went wrong');
            }

            
        }
        
        else {
            $data = [
                'title' => 'Επαναφορά Κωδικού Πρόσβασης Χρήστη',
                'users' => $users,
            ];
            $this->view('administrators/reset', $data);
        }
    }
    public function resetUserPassword($id){

    }

    public function system(){
        $data = [
            'title' => 'Παραμέτροι Συστήματος',
            'description' => 'Παραμέτροι, καταχωρίσεις ενημερώσεων και εκδόσεων',
        ];
        $this->view('administrators/system', $data);
    }

    public function versioning(){
        $versions = $this->pageModel->getVersions();
        $data = [
            'title' => 'Εκδόσεις',
            'description' => 'Προσθήκη - Επεξεργασία Εκδόσεων',
            'versions' => $versions,
        ];
        $this->view('administrators/versioning', $data);
    }

    public function versionshow(){
        $data = [
            'title' => 'Προβολή Έκδοσης',
            'description' => 'Διαχείριση Έκδοσης',
        ];
        $this->view('administrators/versionshow', $data);
    }

    public function versionadd(){
        $data = [
            'title' => 'Προσθήκη Έκδοσης',
            'description' => 'Προσθήκη Νέας Έκδοσης',
        ];
        $this->view('administrators/versionadd', $data);
    }
}