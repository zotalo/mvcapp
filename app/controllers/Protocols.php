<?php

Class Protocols extends Controller {
    public function __construct(){
        if(!isLoggedIn()){
            redirect('pages/index');
        }
        if( $_SESSION['user_role_no'] == 0){
            redirect('users/wait');
        }
        $this->protocolModel = $this->model('Protocol');
        $this->userModel = $this->model('User');
        $this->fileModel = $this->model('File');
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
        if($_SESSION['user_role_no'] < 1 || $_SESSION['user_role_no'] > 2 ){
            flasherror('protocol_message', 'Δεν έχετε δικαιώματα');
            redirect('protocols');
        }
        
        // $currentprotocol = $this->protocolModel->getCurrentProtocol();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'subject'=> trim($_POST['subject']),
                'pdate'=> trim($_POST['pdate']),
                'description'=> trim($_POST['description']),
                'inout' => trim($_POST['inout']),
                'fromto' => trim($_POST['fromto']),
                'nodoc' => trim($_POST['nodoc']),
                'idate' => trim($_POST['idate']),
                //'file' => trim($_POST['file']),
                'userId' => $_SESSION['user_id'],
                'subject_err' => '',
                'pdate_err' => '',
                'fromto_err' => '',
                'nodoc_err' => '',
                'idate_err' => '',
                // 'file_err' => ''
            ];

        //Validate data
        if(empty($data['subject'])){
            $data['subject_err'] = 'Συμπληρώστε το Θέμα';
        }
        if(empty($data['pdate'])){
            $data['pdate_err'] = 'Συμπληρώστε Ημερομηνία';
        }
        if(empty($data['fromto'])){
            $data['fromto_err'] = 'Συμπληρώστε Αποστολέα / Παραλήπτη';
        }
        if($data['idate']==""){
            $data['idate']=null;
        }
        //Make sure no errors
        if(empty($data['subject_err']) && empty($data['pdate_err']) && empty($data['fromto_err'])){
            //Validated
            if($this->protocolModel->addProtocol($data)){
                flash('protocol_message', 'Ολοκληρώθηκε η καταχώρηση');
                redirect('protocols');
            } else {
                die('Something went wrong');
            }
        } else {
            //Load view with errors
            $this->view('protocols/add', $data);
        }
        
    } else {
        $data = [
            'subject'=> '',
            'pdate'=> '',
            'description'=> '',
            'fromto'=> '',
            'nodoc'=> '',
            'idate'=> '',
            // 'file'=> '',
        ];
        $this->view('protocols/add', $data);
        }
    }

    public function show($id){
        //Show Protocol
        $protocol = $this->protocolModel->getProtocolById($id);
        $user = $this->userModel->getUserById($protocol->protocolUser);
        $upduser = $this->userModel->getUserById($protocol->protocolUpdateUser);
        $file = $this->fileModel->getProtocolFile($protocol->protocolId);
        if(empty($file)){
            $filedata = [
                'file' => null,
                'url' => null
            ];
        } else {
            $filedata = [
                'file' => $file->fileProtocolId,
                'url' => $file->fileUrl
            ];
        }
        $data = [
            'protocol' => $protocol,
            'user' => $user,
            'upduser' => $upduser,
            'year' => $protocol->protocolYear,
            'number' => $protocol->protocolNo,
            'subject' => $protocol->protocolSubject,
            'inout' => $protocol->protocolInOut,
            'pdate' => $protocol->protocolDate,
            'fromto' => $protocol->protocolFromTo,
            'description' => $protocol->protocolDescription,
            'nodoc' => $protocol->protocolDocumentNo,
            'idate' => $protocol->protocolDateIssued,
            'file' =>$filedata['file'],
            'url' =>$filedata['url']
            
        ];
        $this->view('protocols/show', $data);
    }
    public function edit($id){
        $protocol = $this->protocolModel->getProtocolById($id);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'id'=> $id,
                'year' => $protocol->protocolYear,
                'number' => $protocol->protocolNo,
                'protocol' => $protocol,
                'subject'=> trim($_POST['subject']),
                'pdate'=> trim($_POST['pdate']),
                'description'=> trim($_POST['description']),
                'inout' => trim($_POST['inout']),
                'fromto' => trim($_POST['fromto']),
                'nodoc' => trim($_POST['nodoc']),
                'idate' => trim($_POST['idate']),
                //'file' => trim($_POST['file']),
                'userId' => $_SESSION['user_id'],
                'subject_err' => '',
                'pdate_err' => '',
                'fromto_err' => '',
                'nodoc_err' => '',
                'idate_err' => '',
                // 'file_err' => ''
            ];

        //Validate data
        if(empty($data['subject'])){
            $data['subject_err'] = 'Συμπληρώστε το Θέμα';
        }
        if(empty($data['pdate'])){
            $data['pdate_err'] = 'Συμπληρώστε Ημερομηνία';
        }
        if(empty($data['fromto'])){
            $data['fromto_err'] = 'Συμπληρώστε Αποστολέα / Παραλήπτη';
        }
        if($data['idate']==""){
            $data['idate']=null;
        }
        //Make sure no errors
        if(empty($data['subject_err']) && empty($data['pdate_err']) && empty($data['fromto_err'])){
            //Validated
            if($this->protocolModel->updateProtocol($data)){
                flash('protocol_message', 'Ενημερώθηκε το πρωτόκολλο ' . $data['year'].'.'.$data['number']);
                redirect('protocols');
            } else {
                die('Something went wrong');
            }
        } else {
            //Load view with errors
            echo $data['subject_err'] . $data['pdate_err'] . $data['fromto_err'];
            $this->view('protocols/edit', $data);
            }
        } else {
            $user = $this->userModel->getUserById($_SESSION['user_id']);
            $protocol = $this->protocolModel->getProtocolById($id);
            $data = [
                'id' => $id,
                'year' => $protocol->protocolYear,
                'number' => $protocol->protocolNo,
                'subject' => $protocol->protocolSubject,
                'inout' => $protocol->protocolInOut,
                'pdate' => $protocol->protocolDate,
                'fromto' => $protocol->protocolFromTo,
                'description' => $protocol->protocolDescription,
                'nodoc' => $protocol->protocolDocumentNo,
                'idate' => $protocol->protocolDateIssued,
                'protocol' =>$protocol
            
            ];
            $this->view('protocols/edit', $data);
        }     

    }



    public function delete($id){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Get existing post from model
            $protocol = $this->protocolModel->getProtocolById($id);
            // Check for owner
            
            if($this->protocolModel->deleteProtocol($id)){
                flash('protocol_message', 'Το Πρωτόκολλο '. $protocol->protocolYear .'.'.$protocol->protocolNo . ' Διεγράφη');
                redirect('protocols');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('protocols');
        }
    }
    
}