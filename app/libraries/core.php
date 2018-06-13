<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of core
 *
 * @author Administrator
 */
/*
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 */
class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];
    
    public function __construct(){
    //    print_r($this->getUrl());
        $url = $this->getUrl();
        
        //Look in controllers for first value
        
        if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
            //If exists, set as controller
            $this->currentController = ucwords($url[0]);
            //unset 0 Index
            unset($url[0]);
        }
        //Require the controller
        require_once '../app/controllers/'. $this->currentController . '.php';
        
        //instantiate controller class
        $this->currentController = new $this->currentController;
        
        //check for second part of url
        if(isset($url[1])){
            //check to see if method exists in controller
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
            }
        }
        
    }
    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
