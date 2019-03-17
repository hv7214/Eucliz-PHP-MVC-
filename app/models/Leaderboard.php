<?php

namespace Models;
use Utils\Util;

class Leaderboard {

        public static function List_users() {

          $db = Util::DB();

          $query_skeleton = $db ->prepare(" SELECT * FROM user ORDER BY points DESC ");
          $query_skeleton -> execute();

          $rows = $query_skeleton -> fetchAll();

          return $rows;
        }

        public static function Rank_array() {

          $db = Util::DB();

          $query_skeleton = $db ->prepare(" SELECT * FROM user ORDER BY points DESC ");
          $query_skeleton -> execute();

          $rows = $query_skeleton -> fetchAll();

          $rank = 1;
          $global_rank = 0;
          $points = -1;
          $array_rank;
          $i=0;

          foreach($rows as $key1 => $value1) {
          $username = $value1['username'];

            foreach($rows as $key2 => $values) {

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
            $array_rank[$i] = $rank;
            $rank = 1;
            $global_rank = 0;
            $points = -1;
            $i++;
        }

         return $array_rank;
        }



}

?>
