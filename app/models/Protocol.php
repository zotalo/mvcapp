<?php
    Class Protocol {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getProtocols(){
            $currentyear = getCurrentYear();
            $this->db->query('
                SELECT protocol.*,
                u1.username,
                u2.username,
                pinout.inOutDescription
                FROM protocol
                INNER JOIN users as u1
                ON protocol.protocolUser = u1.userid
                LEFT JOIN users as u2
                ON protocol.protocolUpdateUser = u2.userid
                INNER JOIN pinout
                ON pinout.inOutId = protocolInOut
                WHERE protocol.protocolYear = :currentyear
                ORDER BY protocol.protocolYear DESC, protocol.protocolNo DESC
                ');
                $this->db->bind(':currentyear', $currentyear);
            
            $results = $this->db->resultSet();
            return $results;
        }

        public function getAllProtocols(){
            $this->db->query('
                SELECT protocol.*,
                u1.username,
                u2.username,
                pinout.inOutDescription
                FROM protocol
                INNER JOIN users as u1
                ON protocol.protocolUser = u1.userid
                LEFT JOIN users as u2
                ON protocol.protocolUpdateUser = u2.userid
                INNER JOIN pinout
                ON pinout.inOutId = protocolInOut
                WHERE protocol.protocolYear < YEAR(CURDATE())
                ORDER BY protocol.protocolYear DESC, protocol.protocolNo DESC
                ');
            
            $results = $this->db->resultSet();
            return $results;
        }

        public function getProtocolById($id){
            $this->db->query('SELECT protocol.*, pinout.inOutDescription FROM protocol 
            INNER JOIN pinout
            ON pinout.inOutId = protocolInOut
            WHERE protocol.protocolId = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();
            return $row;
        }

        public function addProtocol($data){
            $newprotocol = $this->getCurrentProtocol();
            $this->db->query('INSERT INTO protocol (protocolYear, protocolNo, protocolDate, protocolSubject, protocolDescription, protocolInOut, protocolFromTo, protocolDocumentNo, protocolDateIssued, protocolUser) VALUES (:protyear, :protno, :protdate, :protsubject, :protdescription, :protinout, :protfromto, :protdocumentno, :protdateissued, :protuser)');
            //Bind Values 
            $this->db->bind(':protyear', getCurrentYear(), PDO::PARAM_INT);
            $this->db->bind(':protno', $newprotocol, PDO::PARAM_INT);
            $this->db->bind(':protdate', $data['pdate']);
            $this->db->bind(':protsubject', $data['subject']);
            $this->db->bind(':protdescription', $data['description']);
            $this->db->bind(':protinout', $data['inout']);
            $this->db->bind(':protfromto', $data['fromto']);
            $this->db->bind(':protdocumentno', $data['nodoc'], PDO::PARAM_STR);
            $this->db->bind(':protdateissued', $data['idate']);
            $this->db->bind(':protuser', $_SESSION['user_id']);
            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        
//
        public function getCurrentProtocol(){
            $currentyear = getCurrentYear();
            $this->db->query('SELECT protocolNo
            FROM protocol
            WHERE protocolYear = :currentyear
            ORDER BY protocolNo DESC
            LIMIT 1');
            $this->db->bind(':currentyear', $currentyear);
            $row = $this->db->single();
            $new = newProtocol($row->protocolNo);
            return $new;
        }

        public function updateProtocol($data){
            $this->db->query('UPDATE protocol SET protocolDate = :protdate, 
            protocolSubject = :protsubject, 
            protocolDescription = :protdescription, 
            protocolInOut = :protinout, 
            protocolFromTo = :protfromto, 
            protocolDocumentNo = :protdocumentno, 
            protocolDateIssued = :protdateissued, 
            protocolUpdateUser = :protuser
             WHERE protocolId = :protid');
            //Bind Values 
            $this->db->bind(':protid', $data['id']);
            $this->db->bind(':protdate', $data['pdate']);
            $this->db->bind(':protsubject', $data['subject']);
            $this->db->bind(':protdescription', $data['description']);
            $this->db->bind(':protinout', $data['inout']);
            $this->db->bind(':protfromto', $data['fromto']);
            $this->db->bind(':protdocumentno', $data['nodoc'], PDO::PARAM_STR);
            $this->db->bind(':protdateissued', $data['idate']);
            $this->db->bind(':protuser', $data['userId']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function deleteProtocol($id){
            $this->db->query('DELETE FROM protocol WHERE protocolId = :id');
            //Bind values
            $this->db->bind(':id', $id);
            

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        
    }

        public function lastId(){
            $last = $this->db->getLastId();
            return $last;
        }
    }