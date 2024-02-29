<?php

namespace controllers;

require ROOT_PATH."/models/DocumentModel.php";

use models\documentModel;

class Document extends DocumentModel{

    private $model;


    function __construct()
    {
        $this->model = new DocumentModel();
    }
    

    public function getDocument()
    {
        $result = $this->model->getDocumentModel();

        if($result->num_rows > 0){
            while($row = $result->fetch_all(MYSQLI_ASSOC)){
                return $row;
            }
        }else{
            return false;
        }
 
    }


    public function getDocumentId($id)
    {
        $result = $this->model->getDocumentIdModel($id);

        if($result->num_rows > 0){
            while($row = $result->fetch_all(MYSQLI_ASSOC)){
                return $row;
            }
        }else{
            return false;
        }
 
    }


    public function createDocument($type, $fullname, $location, $image, $phoneNumber, $email)
    {
        $create = $this->model->createDocumentModel($type, $fullname, $location, $image, $phoneNumber, $email);
        if($create->num_rows > 0){
           return true;
        }else{
           return false;
        }

    }


    public function deleteDocument($id){
        $delete = $this->model->deleteDocumentModel($id);
        if($delete->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }


    public function updateDocument($id, $status){
        $update = $this->model->updateDocumentModel($id, $status);
        if($update->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }


    public function searchDocument($fullname){
        $search = $this->model->searchDocumentModel($fullname);
        if($search->num_rows > 0){
            while($row = $search->fetch_all(MYSQLI_ASSOC)){
                return $row;
            }
        }else{
            return false;
        }
    }

}