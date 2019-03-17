<?php

namespace Controllers;
use Models\Editques;

class EditController {

  public $msg="";

  public function post($number)  {

        $title    = $_POST['title'];
        $question = $_POST['question'];
        $answer   = $_POST['answer'];

        Editques::edit($number,$title,$question,$answer);

        header("Location: /problem/$number?msg=UPDATED");

    }


}

?>
