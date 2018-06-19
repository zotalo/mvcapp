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
       $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
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

// Prepare statement with query
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }
    
    //Bind values
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
                
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    // Execute the prepared statement
    public function execute(){
        return $this->stmt->execute();
    }
    
    // Get result set as array of objects
    
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    //Get single record as object
    public function single(){
         $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    // Get row count
    public function rowCount(){
        return $this->stmt->rowCount();
    }
}
