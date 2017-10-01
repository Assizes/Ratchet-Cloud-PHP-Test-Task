<?php

class DB{
    
    private static $instance = NULL;
    
    function __construct(){}
    
    public static function getInstance(){
        if(!isset(self::$instance)){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "php_test";
            
            self::$instance = new PDO("mysql:host=".$servername.";dbname=".$database,$username,$password);

            // Check connection
            if (!self::$instance) {
                die("Connection failed: " . self::$instance->errorInfo());
            }
        }
        return self::$instance;
    }
}