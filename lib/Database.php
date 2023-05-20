<?php

class Database
{
    public $host     = DB_HOST;
    public $user     = DB_USER;
    public $password = DB_PASS;
    public $dbname   = DB_NAME;
    public $link;
    public $error;


    public function __construct()
    {
        $this->connectDB();

    }

    private function connectDB(){
        $this->link = new mysqli($this->host,$this->user,$this->password,$this->dbname);
        if (!$this->link){
            $this->error = "Connection Fail".$this->link->connect_error;
        }
    }

    //Insert Data
    public function insert($query){
        $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
        if($insert_row){
            header("Location: index.php?msg=".urlencode('Data Inserted Successfully.'));
            exit();
        } else {
            die("Error : (".$this->link->errno.")".$this->link->error);
        }
    }

    // Select or Read data
    public function select($query){
        $result = $this->link->query($query) or die($this->link->error.__LINE__);
        if($result->num_rows > 0){
            return $result;
        } else {
            return false;
        }
    }

    // Update data
    public function update($query){
        $update_row = $this->link->query($query) or die($this->link->error.__LINE__);
        if($update_row){
            return $update_row;
        } else {
            return false;
        }
    }

    // Delete data
    public function delete($query){
        $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
        if($delete_row){
            return $delete_row;
        } else {
            return false;
        }
    }


}