<?php

class ConnectDb
{
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $tablename;
        public $con;

        // class constructor
    public function __construct(
        $dbname = "cart",
        $tablename = "index_table",
        $servername = "localhost",
        $username = "root",
        $password = ""
    )
    {
      $this->dbname = $dbname;
      $this->tablename = $tablename;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            if (!$this->con){
                die("Connection failed : " . mysqli_connect_error());
            }
    }
    public function getAllData(){
        $sql = "SELECT * FROM $this->tablename";
        $result = mysqli_query($this->con, $sql) or die("Error:".mysqli_error());
        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
    // get product from the database
    public function getData($category){
        $sql = "SELECT * FROM $this->tablename WHERE category='$category' ";
        $result = mysqli_query($this->con, $sql) or die("Error:".mysqli_error());
        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
}