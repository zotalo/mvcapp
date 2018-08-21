<?php
    Class Protocol {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getProtocols(){
            $this->db->query('
                SELECT protocol.*,
                users.username,
                pinout.inOutDescription
                FROM protocol
                INNER JOIN users
                ON protocol.protocolUser = users.userid
                INNER JOIN pinout
                ON pinout.inOutId = protocolInOut
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
            $this->db->query('INSERT INTO protocol 
            (protocolYear, protocolNo, protocolDate, protocolSubject, 
            protocolDescription, protocolInOut, protocolFromTo, protocolDocumentNo, 
            protocolDateIssued, protocolUser VALUES 
            (:protyear, :protno, :protdate, :protsubject, :protdescription, 
            :protinout, :protfromto, :protdocumentno, :protdateissued, :protuser)');
            //Bind Values
            $this->db->bind(':protyear', getCurrentYear());
            $this->db->bind(':protno', $newprotocol);
            $this->db->bind(':protdate', $data['pdate']);
            $this->db->bind(':protsubject', $data['subject']);
            $this->db->bind(':protdescription', $data['description']);
            $this->db->bind(':protinout', $data['inout']);
            $this->db->bind(':protfromto', $data['fromto']);
            $this->db->bind(':protdocumentno', $data['nodoc']);
            $this->db->bind(':protdateissued', $data['idate']);
            $this->db->bind(':protuser', $_SESSION['user_id']);
            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        

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


        
    }