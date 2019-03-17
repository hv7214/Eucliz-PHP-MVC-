<?php

namespace Controllers;
use Models\Problems;

session_start();

class ProblemsController {

    protected $twig;

    public function __construct() {

      $loader = new \Twig_Loader_Filesystem(__DIR__.'/../views') ;
      $this->twig = new \Twig_Environment($loader) ;

    }

    public function get() {

      $rows = Problems::ProblemList();

      echo $this->twig->render("problems.html", array(
        "title" => "Problems" ,
        "problems"  => $rows ,
        "admin"      => isset($_SESSION["admin"]) ,
        "logged_in"  => isset($_SESSION["username"])
      ));
    }


}
?>
