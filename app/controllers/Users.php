<?php 


class Users extends Controller{
    public function __construct(){
        $this->userModel = $this->model('User');
    }
    public function index(){
        if(!isLoggedIn()){
            redirect('users/login');
        }
        $data = [
            'title' => 'Πληροφορίες Χρήστη',
            'id' => $_SESSION['user_id'],
            'role' => $_SESSION['user_role'],
            'name' => $_SESSION['user_name'],
            'email' => $_SESSION['user_email'],
            
        ];
        $this->view('users/index', $data);
    }
    public function register(){
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Validate Email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            } else {
                //Check email
               if($this->userModel->findUserByEmail($data['email'])){

               } 
            }
            // Validate Name
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter name';
            }
            // Validate Password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            } elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be at least 6 characters';
            }

             // Validate Confirm Password
             if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if($data['password']!= $data['confirm_password']){
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                // Validated
                
                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register User
                if($this->userModel->register($data)){
                    flash('register_success', 'You are registered and can log in');
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('users/register', $data);
            }
        }
        else {
            //Init data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            // Load view
            $this ->view('users/register', $data);
        }
    }
    public function login(){
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
             //Init data
             $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }

            // Validate Password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            }

            //Check for user/email
            if($this->userModel->findUserByEmail($data['email'])){
                //user found
            } else {
                $data['email_err'] = 'No user found';
            }

            //Make sure errors are empty
            if(empty($data['email_err']) && empty($data['password_err'])){
                // Validated
                // Check and set loggd in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser){
                    //Create Session
                    $this->createUserSession($loggedInUser);
                } else{
                    $data['password_err'] = 'Password incorrect';
                    $this->view('users/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }

        }
        else {
            //Init data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];
            // Load view
            $this ->view('users/login', $data);
        }
    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->userid;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->username;
        $_SESSION['user_role'] = $user->rolesname;
        $_SESSION['user_role_no'] = $user->userrole;
        redirect('protocols');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_role']);
        unset($_SESSION['user_role_no']);
        session_destroy();
        redirect('users/login');
    }

    public function wait(){
        $data = [
            'title' => 'Αναμονή',
            'description' => 'Αναμονή'
        ];
        $this->view('users/wait', $data);
    }

    public function show(){
        if(!isLoggedIn()){
            redirect('users/login');
        }
        $data = [
            'title' => 'Πληροφορίες Χρήστη',
            'id' => $_SESSION['user_id'],
            'role' => $_SESSION['user_role'],
            'name' => $_SESSION['user_name'],
            'email' => $_SESSION['user_email'],
            
        ];
        $this->view('users/show', $data);

    }
    public function change(){
        if(!isLoggedIn()){
            redirect('users/login');
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'id' => $_SESSION['user_id'],
                'current_password' => trim($_POST['current_password']),
                'new_password' => trim($_POST['new_password']),
                'confirm_new_password' => trim($_POST['confirm_new_password']),
                'current_password_err' => '',
                'new_password_err' => '',
                'confirm_new_password_err' => '',
            ];
            //Validate Old Password
            if($this->userModel->verifyPassword($data['id'], $data['current_password'])){
                //password match
            } else {
                $data['current_password_err'] = 'Λάθος Κωδικός';
            }

             // Validate Password
             if(empty($data['new_password'])){
                $data['new_password_err'] = 'Please enter password';
            } elseif(strlen($data['new_password']) < 6){
                $data['new_password_err'] = 'Password must be at least 6 characters';
            }

             // Validate Confirm Password
             if(empty($data['confirm_new_password'])){
                $data['confirm_new_password_err'] = 'Please confirm password';
            } else {
                if($data['new_password']!= $data['confirm_new_password']){
                    $data['confirm_new_password_err'] = 'Passwords do not match';
                }
            }
            if(empty($data['current_password_err']) && empty($data['new_password_err']) && empty($data['confirm_new_password_err'])){
                // Validated
                
                // Hash Password
                $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);

                //Register User
                if($this->userModel->changePassword($data['id'], $data['new_password'])){
                    flash('change_success', 'Η αλλαγή του κωδικού πραγματοποιήθηκε με επιτυχία');
                    redirect('users/login');
                } else {
                   die('Something went wrong');
                }

            }  //Load view with errors
            $this ->view('users/change', $data);
        } else {
              //Init data
              $data = [
                'id' => $_SESSION['user_id'],
                'current_password' => '',
                'new_password' => '',
                'confirm_new_password' => '',
                'current_password_err' => '',
                'new_password_err' => '',
                'confirm_new_password_err' => ''
            ];
            // Load view
            $this ->view('users/change', $data);
        }
    }
}