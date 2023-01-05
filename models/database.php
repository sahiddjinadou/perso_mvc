<?php
namespace model;
include_once 'assets/ENV/ENV.php';

abstract class database {
    protected function connectDataBase(){
    
        try{
            $conn = new \PDO('mysql:host='.$_ENV['host'].';dbname='.$_ENV['dbname'], $_ENV['username'], $_ENV['password']);
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            // echo 'connexion réussi';
            return $conn;
        
        }catch(\PDOException $e){
            echo 'Erro '.$e->getMessage();
        }
        
    }
    
    
   protected function sendData(string $req,array $data){
        try{
        $BDD =$this->connectDataBase();
            $request = $BDD->prepare($req);
            $request->execute($data);  
    
        }catch(\PDOException $e){
            echo 'Erro '.$e->getMessage();
        }
    }
    
   protected function getOneData(string $req,?array $data=null){
        try{
            $BDD =$this->connectDataBase();
            
            $request = $BDD->prepare($req);
            $result = $request->execute($data);
    
          return  $result= $request->fetch();
    
            // echo '<pre>';
            // print_r($result);
    
    
        }catch(\PDOException $e){
            echo 'Erro '.$e->getMessage();
        }
    }
    
    protected  function getManyData(string $req,?array $data=null){
        try{
            $BDD =$this->connectDataBase();

            $request = $BDD->prepare($req);
            $result = $request->execute($data);
    
           return $result= $request->fetchAll();
            // echo '<pre>';
            // print_r($result);
    
    
        }catch(\PDOException $e){
            echo 'Erro '.$e->getMessage();
        }
    }
}