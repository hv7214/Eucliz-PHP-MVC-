<?php

namespace Models;
use Utils\Util;


class Signup {

    public static function Validate($username,$password,$cnf_password) {

      $db = Util::DB();

      $username = stripslashes($username);
      $password = stripslashes($password);
      $cnf_password = stripslashes($cnf_password);
      //check for existing username

      $query_skeleton = $db -> prepare("SELECT * FROM user WHERE username=:username");

      $query_skeleton->execute( array(
        "username" => $username
      ));

      $row = $query_skeleton->fetch(\PDO::FETCH_ASSOC);

      if($row) {
        return  false;
      }

      //check match password

      if($password != $cnf_password ) {
        return false;
      }

      return true;
    }

    function Register($username, $password) {

      $db = Util::DB();

      $username = stripslashes($username);
      $password = stripslashes($password);
      $password_hash = hash("SHA256", $password);
      $admin = 0;
      $points = 0 ;

      $query_skeleton = $db -> prepare("INSERT INTO user(username,password,admin,points) VALUES(:username,:password,:admin,:points) ");

      $query_skeleton -> execute(array(
        "username" => $username,
        "password" => $password_hash,
        "admin"    => $admin,
        "points"   => $points
      ));


    }
}

?>
