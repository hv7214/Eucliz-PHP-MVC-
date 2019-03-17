<?php

  namespace Controllers;
  use Models\Problems;

  session_start();

  class HomeController {

    protected $twig;

    public function __construct() {

        $loader = new \Twig_Loader_Filesystem(__DIR__.'/../views') ;
        $this->twig = new \Twig_Environment($loader) ;

    }

    public function get() {

        $rows = Problems::ProblemList();
        $rev_rows = array_reverse($rows);

        echo $this->twig->render("home.html",array(
          "title"      => "Eucliz" ,
          "problems"   =>  $rev_rows ,
          "admin"      => isset($_SESSION["admin"]) ,
          "logged_in"  => isset($_SESSION["username"])
        ));
    }



  }

?>
