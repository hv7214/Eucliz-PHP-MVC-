<?php

  namespace Models;
  use Utils\Util;

  class Problems {

      public static function ProblemList() {                         //get All questions

        $db = Util::DB();

        $questions = $db->prepare("SELECT number,title,no_of_users FROM ques");

        $questions->execute();

        $rows = $questions->fetchAll();

        return $rows;
      }

      public static function GetProblem($number) {                  //get one ques

        $db = Util::DB();

        $question = $db->prepare("SELECT number,title,question,no_of_users FROM ques WHERE number=:number");

        $question->execute(array (
          "number" => $number
        ));

        $row = $question->fetch(\PDO::FETCH_ASSOC);

        return $row;
      }

      public static function GetProblem_admin($number) {                  //get one ques

        $db = Util::DB();

        $question = $db->prepare("SELECT number,title,answer,question,no_of_users FROM ques WHERE number=:number");

        $question->execute(array (
          "number" => $number
        ));

        $row = $question->fetch(\PDO::FETCH_ASSOC);

        return $row;
      }

      public static function Points_increase($username) {                     //increase user points

        $db = Util::DB();

        $query_skeleton = $db -> prepare("SELECT * FROM user WHERE username=:username");
        $query_skeleton -> execute( array(
          "username"    => $username,
        ));

        $row = $query_skeleton -> fetch(\PDO::FETCH_ASSOC);

        $points_initial = $row['points'];
        $points_final = $points_initial + 1;

        $query_skeleton = $db -> prepare("UPDATE user SET points=:points WHERE username=:username");
        $query_skeleton -> execute( array(
          "points"    => $points_final,
          "username"  => $username
        ));

      }

      public static function Checksolved($username, $number) {       //to check if ques is solved by user

        $db = Util::DB();

        $query_skeleton = $db -> prepare("SELECT * FROM solved_check WHERE username=:username AND ques_number=:number");
        $query_skeleton -> execute( array(
          "username"    => $username,
          "number" => $number
        ));

        $row = $query_skeleton -> fetch(\PDO::FETCH_ASSOC);

        if($row)
         return true;

        else
         return false;

      }

      public static function Checkans($username, $number, $answer) {    //to check ans

        $solved = Problems::Checksolved($username, $number);

        $db = Util::DB();

        $query_skeleton = $db -> prepare("SELECT * FROM ques WHERE number=:number");
        $query_skeleton -> execute( array(
          "number" => $number
        ));

        $row = $query_skeleton -> fetch(\PDO::FETCH_ASSOC);

        if($row['answer'] == $answer )
          {
            if(!$solved) {
                Problems::Points_increase($username);

                $query_skeleton = $db -> prepare("INSERT INTO solved_check(username,ques_number) VALUES(:username, :number)");
                $query_skeleton -> execute( array(
                  "username" => $username,
                  "number"   => $number,
                ));

                $query_skeleton = $db -> prepare("SELECT * ques WHERE number=:number");
                $query_skeleton -> execute( array(
                  "number"   => $number,
                ));

                $row = $query_skeleton -> fetch(\PDO::FETCH_ASSOC);
                $number_of_solves = $row['no_of_users'];
                $number_of_solves_new = $number_of_solves + 1;

                $query_skeleton = $db -> prepare("UPDATE ques SET no_of_users=:no_of_users WHERE number=:number");
                $query_skeleton -> execute( array(
                  "no_of_users" => $number_of_solves_new,
                  "number"      => $number
                ));
            }
            return true;
          }
        else {
            return false;
        }

      }

    }

 ?>
