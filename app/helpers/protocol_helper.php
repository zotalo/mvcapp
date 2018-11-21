<?php
    
    
    function newProtocol($current){
        if(($current)== null){
            $new = 1;
            return $new;
        } else {
            $new = $current + 1;
            return $new;
        }
    }

    function inOutValue($inout){
        if($inout==0){
            return $io=[1, "Εξερχόμενο"];
            } else {
            return $io=[0, "Εισερχόμενο"];
        }
    }