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

    public function add($id){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $protocol = $this->protocolModel->getProtocolById($id);
            $name = basename($_FILES['file']['name']);
            $ext = pathinfo($name,PATHINFO_EXTENSION);
            $data = [
                'protocol' =>$id,
                'year'=> $protocol->protocolYear,
                'protocolno' => $protocol->protocolNo,
                'name'=> $name,
                'ext' => $ext,
                'directory' => UPLOADS,
                'ext_err' =>'',
                'file_err' =>'',

            ];

            //Data Validation
            $filetype = $this->fileModel->getFileType($data['ext']);
            
            if(empty($filetype)){
                $data['ext_err'] = 'Ο συγκεκριμένος τύπος αρχείου δεν υποστηρίζεται';
            }
            if(empty($_FILES['file']['name'])){
                $data['file_err'] = 'Δεν επιλέξατε αρχείο';
            }
            if(empty($data['ext_err']) && empty($data['file_err'])){
                //Validated
                $data['ftid'] = $filetype->fileTypeId;
                $data['file'] = UPFOLD.$data['year'].'/'.$data['protocolno'].'-'.$data['name'];
                $data['url'] = UPLOADS.$data['year'].'/'.$data['protocolno'].'-'.$data['name'];
                if(move_uploaded_file($_FILES['file']['tmp_name'],$data['file'])){
                if($this->fileModel->addFile($data)){
                    flash('file_message', 'Το αρχείο ' . $data['file'].'ανέβηκε.');
                    redirect('protocols/show/'.$id);
                } else {
                    die('Something went wrong');
                }
            }
            } else {
                echo $data['ext_err'] . $data['file_err'];
                $this->view('protocols/show/'.$id, $data);
            }
        }
    }
    public function show($id){
        $file = $this->fileModel->getFileById($id);
        $data = [
            'url'=> $file->fileUrl,
            'name'=> $file->fileName,
            'id' => $file->fileProtocolId,
        ];
        $this->view('files/show', $data);
    }
}