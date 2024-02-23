<?php

function __autoload($class_name) {
    include $class_name . '.php';
}

class UserResource{
    public function doPost(){
        $data = json_decode(file_get_contents("php://input"));
        $user = new Users();
        $user->setFirstName($data->firstName);
        $user->setLastName($data->lastName);
        $user->setEmail($data->email);
        $user->setPassword($data->password);
        $user->save();
    }
    
    public function doGet(){
        $user = new Users();
        $user->setId($_GET['id']);
        $user->load();
        echo $user->json();
    }
    
    public function doPut(){
        $data = json_decode(file_get_contents("php://input"));
        $user = new Users();
        $user->setId($data->id);
        $user->setFirstName($data->firstName);
        $user->setLastName($data->lastName);
        $user->setEmail($data->email);
        $user->setPassword($data->password);
        $user->update();
    }
    
    public function doDelete(){
        $user = new Users();
        $user->setId($_GET['id']);
        $user->delete();
    }
}
?>