<?php

namespace Controllers;
use Models\Admin;

session_start();

class AddController {

  protected $twig;

  public function __construct() {

      $loader = new \Twig_Loader_Filesystem(__DIR__.'/../views') ;
      $this->twig = new \Twig_Environment($loader) ;

  }

  public function get() {

    echo $this->twig->render("addques.html", array(
        "title"             => "Add Question",
        "admin"             => isset($_SESSION['admin']),
        "logged_in"         => isset($_SESSION['username']),
        "msg"               => ""
    ));

    }

  public function post() {

    $title    = $_POST['title'];
    $question = $_POST['question'];
    $answer   = $_POST['answer'];

    Admin::Addques( $title, $question, $answer);

    echo $this->twig->render("addques.html", array(
        "title"             => "Add Question",
        "admin"             => isset($_SESSION['admin']),
        "logged_in"         => isset($_SESSION['username']),
        "msg"               => "Added Successfully"
    ));
  }
  }
?>
