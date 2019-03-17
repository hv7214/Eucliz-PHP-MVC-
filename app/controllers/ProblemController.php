<?php

namespace Controllers;
use Models\Problems;

session_start() ;

class ProblemController {

      protected $twig;

      public function __construct() {
        $loader = new \Twig_Loader_Filesystem(__DIR__.'/../views');
        $this->twig = new \Twig_Environment($loader);
      }

      public function get($number) {

        $msg="";

        if(isset($_GET['msg']))
          $msg = $_GET['msg'];

        if(!isset($_SESSION["admin"])) {

        $row = Problems::GetProblem($number);

        echo $this->twig->render("problem.html", array(
          "title"      => $row['title'],
          "problem"    => $row,
          "admin"      => isset($_SESSION["admin"]) ,
          "logged_in"  => isset($_SESSION["username"]),
          "msg"        => $msg
        ));
        }

        else {
          $row = Problems::GetProblem_admin($number);

          echo $this->twig->render("problem.html", array(
            "title"            => $row['title'],
            "admin_problem"    => $row,
            "admin"            => isset($_SESSION["admin"]) ,
            "logged_in"        => isset($_SESSION["username"]),
            "msg"              => $msg
          ));
        }
      }
}

?>
