<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bootstrap
 *
 * @author Administrator
 */
//Load Config
require_once 'config/config.php';
//Load Libraries
require_once 'libraries/Core.php';
require_once 'libraries/Controller.php';
require_once 'libraries/Database.php';

//Autoload Core Libraries
spl_autoload_register(function($className){
    
});