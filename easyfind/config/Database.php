<?php

namespace config;

use mysqli;

class Database{

    private $db = [];
    
    
    function __construct()
    {
        $this->db['host'] = "localhost";
        $this->db['name'] = "eazyfind";
        $this->db['user'] = "root";
        $this->db['password'] = "";
    }

    public function dbConnect(){

        $connection = new mysqli(
            $this->db['host'],
            $this->db['user'],
            $this->db['password'],
            $this->db['name']
        );

        if($connection->error){
            return false;
        }else{
            return $connection;
        }

        //close connection in the end
        $connection->close();
    }


}