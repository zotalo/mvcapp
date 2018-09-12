<?php

Class File {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getFiles(){
        $this->db->query('
            SELECT files.*,
            filetype.fileTypeName
            FROM files
            INNER JOIN filetype
            ON files.fileId = filetype.fileTypeId
            ORDER BY files.fileProtocolid DESC
        ');

        $results = $this->db->resultSet();
        return $results;
    }

    public function getFileById($id){

    }

    public function getProtocolFile($id){
        $this->db->query('SELECT * FROM files WHERE fileProtocolId = :protocolid');
        
        $this->db->bind(':protocolid', $id);

        $row = $this->db->single();
        return $row;
    }

    public function getProtocolFiles($id){
       
    }

    public function addFile($data){
        $this->db->query('INSERT INTO files (fileProtocolId, fileType, fileName, fileUrl) 
        VALUES (:id, :ftype, :name, :url)');
        //Bind Values
        $this->db->bind(':id', $data['protocol']);
        $this->db->bind(':ftype', $data['ftid']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':url', $data['file']);
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function deleteFile($id){

    }

    public function getFileType($ext){
        $this->db->query('SELECT * FROM filetype WHERE fileTypeName = :ext');
        $this->db->bind(':ext', $ext);
        $row = $this->db->single();
        return $row;
    }
}