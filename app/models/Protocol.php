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
    }