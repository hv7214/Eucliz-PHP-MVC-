<?php

namespace Controllers;
use Models\Profile;

session_start();

class OtherProfileController {

  protected $twig;

  public function __construct() {

      $loader = new \Twig_Loader_Filesystem(__DIR__.'/../views') ;
      $this->twig = new \Twig_Environment($loader) ;

  }

  public function get($username) {

    $row1 = Profile::Details($username);
    $row2 = count(Profile::Questions_solved($username));
    $row3 = Profile::Totalques();
    $rank = Profile::Rank($username);

    echo $this->twig->render("profile.html", array(
        "title"             => "Profile",
        "details"           => $row1,
        "questions_solved"  => $row2,
        "total_ques"        => $row3,
        "rank"              => $rank,
        "admin"             => isset($_SESSION['admin']),
        "logged_in"         => isset($_SESSION['username'])
    ));
    }

  }
?>
