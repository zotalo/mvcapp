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

    }

    public function deleteFile($id){

    }
}