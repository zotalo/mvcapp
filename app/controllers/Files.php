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
            
            // if(empty($_FILES['file']['name'])){
            //     $data['file_err'] = 'Δεν επιλέξατε αρχείο';
            // }
            if (!is_uploaded_file($_FILES['file']['name'])){
                $data['file_err'] = 'Δεν έχετε επιλέξει αρχείο';
            }
            else if(empty($filetype)){
                $data['ext_err'] = 'Ο συγκεκριμένος τύπος αρχείου δεν υποστηρίζεται';
            }
            
            if(empty($data['ext_err']) && empty($data['file_err'])){
                //Validated
                if(!file_exists(UPFOLD.$data['year'])){
                    mkdir(UPFOLD.$data['year'], 0755, true);
                }
                $data['ftid'] = $filetype->fileTypeId;
                $data['file'] = UPFOLD.$data['year'].'/'.$data['year'].$data['protocolno'].'-'.$data['name'];
                $data['url'] = UPLOADS.$data['year'].'/'.$data['year'].$data['protocolno'].'-'.$data['name'];
                if(move_uploaded_file($_FILES['file']['tmp_name'],$data['file'])){
                if($this->fileModel->addFile($data)){
                    flash('protocol_message', 'Το αρχείο ' . $data['file'].'ανέβηκε.');
                    redirect('protocols');
                } else {
                    die('Something went wrong');
                }
            }
            } else {
             //   echo $data['ext_err'] . $data['file_err'];
             $this->view('protocols/show/'.$id, $data);
                redirect('protocols/show/' .$id);
                
            }
        }
    }
    public function show($id){
        $file = $this->fileModel->getFileById($id);
        $data = [
            'url'=> $file->fileUrl,
            'name'=> $file->fileName,
            'id' => $file->fileProtocolId,
            'fileid' => $file->fileId,
        ];
        $this->view('files/show', $data);
    }

    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $files = $this->fileModel->getFileById($id);
            $filename = $files->fileName;
            $filepath = dirname(__FILE__,2).$files->fileUrl;
            if(unlink($filepath)){
            if($this->fileModel->deleteFile($id)){
                flash('file_message', 'Το αρχείο '. $filename. ' διεγράφη!');
                redirect('protocols');
            } else {
                die('Something went wrong');
            }
        } else {
            flasherror('protocol_message', 'Σφάλμα! Δεν έγινε η διαγραφή!');
            redirect ('protocols');
        }
        } else {
            redirect('protocols');
        }
    }
}   