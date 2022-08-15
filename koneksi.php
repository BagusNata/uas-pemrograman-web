<?php
  class database{
    //Development connection
    private $host     = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "bo203_db";
  
    protected $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if (!$this->conn){
          echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
          exit;
        }
        return $this->conn;
     } 
  }
?>
