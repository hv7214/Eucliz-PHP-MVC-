<?php

namespace Models;
use Utils\Util;

class Editques {

      public static function edit($number,$title,$question,$answer) {

        $db = Util::DB();
        $query_skeleton = $db -> prepare("UPDATE ques SET title=:title, question=:question, answer=:answer WHERE number=:number");
        $query_skeleton -> execute( array(
          "title" => $title ,
          "question" => $question,
          "answer"   => $answer,
          "number"   => $number
        ));


      }
}

?>
