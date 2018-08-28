<?php

Class Files extends Controller {
    public function __construct(){
        $this->fileModel = $this->model('File');
        $this->protocolModel = $this->model('Protocol');

    }

    public function index(){

        $files = $this->fileModel->getFiles();
        $data = [
            'id' => $files->filedId,
            'protid' => $files->fileProtocolId,
            'type' => $files->fileType,
            'typename' => $files->fileTypeName,
            'name' => $files->fileName,
            'url' => $files->fileUrl
        ];
        $this->view('files/index', $data);
    }
}