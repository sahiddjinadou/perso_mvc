<?php
namespace model;
require_once 'database.php';

class user extends database{
    
   public function insertUser(array $data){
        $req="INSERT INTO `users`(`nom`, `prenom`, `email`, `passwd`) VALUES (?,?,?,?)";
        $this->sendData($req,$data);
    }

    public function getUserById(array $data){
        $req = "SELECT `id`, `nom`, `prenom`, `email`, `passwd` FROM `users` WHERE id=?";
        return $result= $this->getOneData($req,$data);
    }
    public function getAllUser(?array $data=Null){
        $req = "SELECT `id`, `nom`, `prenom`, `email`, `passwd` FROM `users`";
        return $result= $this->getManyData($req,$data);
    }

    public function updateByIdUser(array $data){
        $req = "UPDATE `users` SET `nom`=?,`prenom`=?,`email`=?,`passwd`=? WHERE `id`=?";
        $this->sendData($req,$data);
    }

    public function deleteUser(int $id){
        $req = "DELETE FROM `users` WHERE id=?";
        $this->sendData($req,[$id]);
    }

}