<?php

class DbConnection{
  //public $connection;
  private $host = "localhost";
  private $database = "caies";
  private $username = "root";
  private $password = "root";
  public static $db_instance;


  private function __construct(){
    try{
      $this->dbh = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, "root", "root");
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }


    // $this->dbh = new mysqli($this->host, $this->username, $this->password, $this->database);
    // if($conn->connect_error){
    //   echo "Connection failed";
    //   die("Connect failed: " . $conn->connect_error);
    // }else{
    //   echo "Connection success";
    // }
  }

  public static function getInstance(){
    if(!self::$db_instance){
      self::$db_instance = new self();
    }
    return self::$db_instance;
  }
  // function getSingletonConnection(){
  //
  //   if($connection === )
  //   echo "asdndn";
  //   $connection = new mysqli($host, $username, $password, $database);
  //
  //   if($conn->connect_error){
  //     echo "Connection failed";
  //     die("Connect failed: " . $conn->connect_error);
  //   }else{
  //     echo "Connection success";
  //   }
  //   return $conn;
  // }

  private function __clone() {
       // Stopping Clonning of Object
   }

   private function __wakeup() {
       // Stopping unserialize of object
   }
}
?>
