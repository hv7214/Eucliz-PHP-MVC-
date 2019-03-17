<?php

namespace Models;
use Utils\Util;

class Admin {

      public static function Addques($title,$question,$answer) {

            $db = Util::DB();

            $query_skeleton = $db -> prepare("INSERT INTO ques(title,question,answer) VALUES(:title,:question,:answer)");
            $query_skeleton -> execute( array(
              "title"    => $title,
              "question" => $question,
              "answer"   => $answer
            ));

      }
}

?>
