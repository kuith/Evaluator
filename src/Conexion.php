<?php

Class Conexion{
	private $con_host;
	private $con_user;
	private $con_password;
	private $con_bd;
    private $con_port;
    private $con;

	// singleton instance 
  	private static $_instance; 

  	// private constructor function 
  	// to prevent external instantiation 
  	private function __construct() {
      $this->setConnection();
      $this->connect();
    } 
		
 		/*Evitamos el clonaje del objeto. Patrón Singleton*/
    private function __clone(){ }
		
  	// getInstance method 
    public static function getInstance() { 
        if (!(self::$_instance instanceof self)){
            self::$_instance=new self();
        }
        return self::$_instance;
    }
		
  	private function setConnection() {
        require "config.php";
        $this->con_host = $host;
        $this->con_user = $user;
        $this->con_password = $password;
        $this->con_db = $db;
        $this->con_port = $port;
  	}
  	
    private function connect(){
        //Open a new connection to the MySQL server
        $this->con = new mysqli(
            $this->con_host, 
            $this->con_user, 
            $this->con_password, 
            $this->con_db,
            $this->con_port
        );

        //Output any connection error
        if ($this->con->connect_errno) {
            die('Error : ('. $this->con->connect_errno .') '. $this->con->connect_error);
        }
    }

    public function getHost() {
        $var = $this->con_host;
        return $var;
    }
      
    public function getUser() {
        $var = $this->con_user;
        return $var;
    }
      
    public function getPassword() {
        $var = $this->con_password;
        return $var;
    }
      
    public function getDb() {
        $var = $this->con_db;
        return $var;
    }

    public function query($p_sql) {
        return $this->con->query($p_sql);
    }
}