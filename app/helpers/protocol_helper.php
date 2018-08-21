<?php
    function getCurrentYear(){
        $cy = date("Y");
        // $this->db->query('SELECT YEAR(CURRENT_DATE)');
        // $row = $this->db->single();
        // return $row;
        return $cy;
    }
    
    function newProtocol($current){
        if(($current)== null){
            $new = 1;
            return $new;
        } else {
            $new = $current + 1;
            return $new;
        }
    }