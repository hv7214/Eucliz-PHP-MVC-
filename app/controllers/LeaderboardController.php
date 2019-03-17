<?php

  namespace Controllers;
  use Models\Leaderboard;

  session_start();

  class LeaderboardController {

    protected $twig;

    public function __construct() {

        $loader = new \Twig_Loader_Filesystem(__DIR__.'/../views') ;
        $this->twig = new \Twig_Environment($loader) ;

    }

    public function get() {

        $rows = Leaderboard::List_users();
        $array_rank = Leaderboard::Rank_array();

        if(isset($_SESSION["username"])) {
        echo $this->twig->render("leaderboard.html",array(
          "title"      => "Leaderboard" ,
          "users"      => $rows ,
          "array_rank" => $array_rank,
          "username"   => $_SESSION["username"],
          "admin"      => isset($_SESSION["admin"]) ,
          "logged_in"  => isset($_SESSION["username"])
        ));
        }

        else {
          echo $this->twig->render("leaderboard.html",array(
            "title"      => "Leaderboard" ,
            "users"      => $rows ,
            "array_rank" => $array_rank,
            "admin"      => isset($_SESSION["admin"]) ,
            "logged_in"  => isset($_SESSION["username"])
          ));
        }

  }



  }

?>
