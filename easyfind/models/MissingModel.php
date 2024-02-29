<?php

namespace models;
require ROOT_PATH."/config/Database.php";

use config\Database;

class MissingModel extends Database{

    private $db;
    private $type;
    private $fullname;
    private $location;
    private $image;
    private $phoneNumber;
    private $email;

    private $id;
    private $status;

    function __construct()
    {
        $this->db = new Database();
        // Database connection
        $this->connection = $this->db->dbConnect();
    }

    public function getDocumentModel(){
        $sql = "SELECT * FROM missing";
        $result = $this->connection->query($sql);
        return $result;
    }

    public function getDocumentIdModel($id){
        $this->id = $id;
        $sql = "SELECT * FROM missing WHERE id = $this->id";
        $result = $this->connection->query($sql);
        return $result;
    }


    public function createDocumentModel($type, $fullName, $location, $image, $phoneNumber, $email){

        $this->type = $type;
        $this->fullname = $fullName;
        $this->location = $location;
        $this->image = $image;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;

        $sql = "INSERT INTO missing (type, fullname, location, image, phoneNumber, email)
        VALUES ('{$this->type}', '{$this->fullname}', '{$this->location}', '{$this->image}', '{$this->phoneNumber}', '{$this->email}')";
        $result = $this->connection->query($sql);
        return $result;   
    }

    public function deleteDocumentModel($id){
        $this->id = $id;
        $sql = "DELETE FROM missing WHERE id = $this->id";
        $result = $this->connection->query($sql);
        return $result;   
    }

    public function updateDocumentModel($id, $status){
        $this->id = $id;
        $this->status = $status;

        $sql = "UPDATE missing set status = {$this->status} WHERE id = {$this->id}";
        $result = $this->connection->query($sql);
        return $result;   
    }


    public function searchDocumentModel($fullName){

        $this->fullname = $fullName;

        $sql = "SELECT * FROM missing WHERE fullname LIKE '%$this->fullname%'";
        $result = $this->connection->query($sql);
        return $result;

    }



}