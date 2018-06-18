<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of database
 *
 * @author Administrator
 * PDO Database Class
 * Connect to database
 * Create prepared statements
 * Bind values
 * Return rows and results
 */
class database {
   private $host = DB_HOST;
   private $user = DB_USER;
   private $pass = DB_PASS;
   private $dbname = DB_NAME;
   
   private $dbh;
   private $stmt;
   private $error;
   
   public function __construct(){
       //SET DSN
       $dsn = 'mysql:host=' .$this->host .';dbaneme = ' . $this->dbname;
       $options = array(
           PDO::ATTR_PERSISTENT => true,
           PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
       );
       
       //Create PDO instance
       try{
           $this->dbh = new PDO($dsn, $this->user, $this->pass, $options)
                   ;
       } catch (PDOException $e) {
           $this->error = $e->getMessage();
           echo $this->error;

       }
}
}
