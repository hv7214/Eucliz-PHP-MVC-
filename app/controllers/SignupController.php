<?php

namespace Controllers;
use Models\Signup;

class SignupController {

      public function __construct() {

        $loader = new \Twig_Loader_Filesystem(__DIR__.'/../views');
        $this->twig = new \Twig_Environment($loader);
      }

      public static function post() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cnf_password = $_POST['confirm_password'];

        if(Signup::Validate($username,$password,$cnf_password)) {
           Signup::Register($username,$password);
           echo $this->twig->render("login.html", array(
             "title" => "Account",
             "login" =>  false,
             "msg"   =>  "Registered"
           ));
         }

        else {
          echo $this->twig->render("login.html", array(
            "title" => "Account",
            "login" =>  false ,
            "msg"   =>  "Username exists or password is not matching"
          ));
        }


      }

}

?>
