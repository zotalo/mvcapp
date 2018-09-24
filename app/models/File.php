<?php

Class File {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getFiles(){
        $this->db->query('
            SELECT files.*,
            filetype.fileTypeName,
            protocol.protocolYear,
            protocol.protocolNo
            FROM files
            INNER JOIN filetype
            ON files.fileType = filetype.fileTypeId
            INNER JOIN protocol
            ON files.fileProtocolId = protocol.protocolId
            ORDER BY files.fileProtocolid DESC
        ');

        $results = $this->db->resultSet();
        return $results;
    }

    public function getFileById($id){
        $this->db->query('SELECT * FROM files WHERE fileId = :id');
        
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
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
        $this->db->bind(':url', $data['url']);
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function deleteFile($id){
        $this->db->query('DELETE FROM files WHERE fileId = :id');
        //Bind values
        $this->db->bind(':id', $id);

        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getFileType($ext){
        $this->db->query('SELECT * FROM filetype WHERE fileTypeName = :ext');
        $this->db->bind(':ext', $ext);
        $row = $this->db->single();
        return $row;
    }
}