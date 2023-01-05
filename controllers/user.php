<?php
namespace controllers;
require 'models/user.php';
class user
{
    private $model ;
    public function __construct(){
        $this->model = new \model\user();
        if(isset($_GET["target"])){
            $target = $_GET["target"];
            $this->$target($_GET["id"]);
        }else{
            $this->updateUsers();
        }
    }
    public function verifIsncrp()
    {
        if (isset($_POST['inscrire'])) {
            $fname = trim(stripslashes(isset($_POST["fname"]) ? $_POST["fname"] : ""));
            $lname = trim(stripslashes(isset($_POST["lname"]) ? $_POST["lname"] : ""));
            $email = trim(stripslashes(isset($_POST["email"]) ? $_POST["email"] : ""));
            $passwd = trim(stripslashes(isset($_POST["passwd"]) ? $_POST["passwd"] : ""));
            $confpwd = trim(stripslashes(isset($_POST["confpwd"]) ? $_POST["confpwd"] : ""));

            if (
                !empty($fname) && !empty($lname) &&
                !empty($email) && !empty($passwd) &&
                !empty($confpwd)
            ) {
                if ($passwd == $confpwd) {
                    $password = password_hash(stripslashes(trim($_POST["passwd"])), PASSWORD_DEFAULT);
                    $info = [$fname, $lname, $email, $password,];
                    return $info;
                }


            }

        }
    }


    public function addUser()
    {
        if (isset($_POST['inscrire'])) {
            $infosUser = $this->verifIsncrp();
            
            $this->model->insertUser($infosUser);
            echo "inscription ok";

        }
        // header("location:");
        $template = "views/page/inscription.php";
        include_once 'views/main.php';
    }


    public function allUsers()
    {
        $users = $this->model->getAllUser();
        $template = "views/page/liste_user.php";
        include_once 'views/main.php';
    }


    public function deleteUsers($data)
    {
        if (isset($_GET["id"])) {
            $this->model->deleteUser(intval($_GET["id"]));
        }
        $this->allUsers();
        $template = "views/page/liste_user.php";
        include_once 'views/main.php';
        
    }
    public function updateUsers(){
      if(isset($_GET["id"])){
          $value = $_GET["id"];
        //   var_dump($_GET["id"]);

      }
        
        $users = $this->model->getAllUser();
        $template = "views/page/liste_user.php";
        include_once 'views/main.php';
    }

    
}