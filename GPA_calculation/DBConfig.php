<?php

class DBConfig {
    private $_host = "localhost";
    private $_databaseUser = "root";
    private $_password = "";
    private $_dbname = "result_info";
    protected $con;

    //constructor this is default and there is a return type in this constructor but there no return type use
    public function __construct(){

        //if(empty(!$this->con))

        if(!$this->con){

            $this->con = new mysqli($this->_host,$this->_databaseUser,$this->_password,$this->_dbname);
            if($this->con){
                return $this->con;

            }else{
                echo "Database not connected !";
                exit;
            }
        }

    }
}
?>