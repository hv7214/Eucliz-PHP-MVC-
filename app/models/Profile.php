<?php

namespace Models;
  use Utils\Util;

  class Profile {

    public function Details($username) {

      $db = Util::DB();

      $query_skeleton = $db->prepare("SELECT * FROM user WHERE username=:username");

      $query_skeleton -> execute( array(
        "username" => $username
      ));

      $row = $query_skeleton -> fetch(\PDO::FETCH_ASSOC);

      return $row;
    }

    public static function Questions_solved($username) {       //to check if ques is solved by user

      $db = Util::DB();

      $query_skeleton = $db -> prepare("SELECT * FROM solved_check WHERE username=:username ");
      $query_skeleton -> execute( array(
        "username"    => $username
      ));

      $rows = $query_skeleton -> fetchAll();

      return $rows ;

    }

    public static function Totalques() {

      $db = Util::DB();

      $query_skeleton = $db -> prepare(" SELECT * FROM ques ");
      $query_skeleton -> execute();

      $rows = $query_skeleton -> fetchAll();
      $rev_rows = array_reverse($rows);

      $last_row = $rev_rows[0];

      return $last_row['number'];
    }

    public static function Rank($username) {

      $db = Util::DB();

      $query_skeleton = $db ->prepare(" SELECT * FROM user ORDER BY points DESC ");
      $query_skeleton -> execute();

      $rows = $query_skeleton -> fetchAll();

      $rank = 1;
      $global_rank = 0;
      $points = -1;

      foreach($rows as $key => $values) {

        if($values['admin']!=1) {
          $global_rank++;

          if($points != $values['points']) {
            $rank = $global_rank;
            }

          if($username == $values['username']) {
              break;
          }

          $points = $values['points'];
        }
      }

      return $rank;
    }
  }

?>
