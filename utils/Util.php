<?php

    namespace Utils;

    class Util {

        public static function DB() {

          include __DIR__."/../configs/credentials.php" ;
          return new \PDO("mysql:dbname=".
          $db_connect['db']. ";host=".
          $db_connect['server'].";charset=utf8mb4",
          $db_connect['username'],
          $db_connect['password']);
        }
    }

 ?>
