<?php 


class Users {
    public function __construct(){

    }

    public function register(){
        //Check for POST
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            //process form
        }
        else {
            // Load form
            echo 'load form';
        }
    }
}