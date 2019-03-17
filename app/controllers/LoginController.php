<?php

  namespace Controllers;
  use Models\Login;

  session_start();

  class LoginController {

    protected $twig;

    public function __construct() {

        $loader = new \Twig_Loader_Filesystem(__DIR__.'/../views') ;
        $this->twig = new \Twig_Environment($loader) ;

    }

    public function get() {

      echo $this->twig->render("login.html",array(
            "title" => "Account",
            "login" => true

      ));

    }

    public function post() {
      $username = $_POST["username"];
      $password = $_POST["password"];

      if(Login::Verify($username, $password)) {
        $_SESSION["username"] = $username;
        $_SESSION["admin"] = Login::Admin($username);
        header("Location: /");
      }
      else {
        echo $this->twig->render("login.html",array(
              "title" => "Account",
              "login" => true,
              "msg"   => "Invalid username or password"
          ));
      }
    }
  }
 ?>
