<?php

namespace Controllers;
use Models\Problems;

session_start() ;

class SubmitController {


      public function post($number) {

        $username = $_SESSION['username'];
        $answer   = $_POST['answer'];

        $check = Problems::Checkans($username, $number, $answer);
        $row   = Problems::GetProblem($number);

        if($check)
          $msg = "Correct";
        else
          $msg = "Wrong";

        header("Location:/problem/$number?msg=$msg");
      }
  }

?>
