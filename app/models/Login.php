<?php

    namespace Models;
    use Utils\Util;

  

    class Login {

    public static function Verify($username, $password) {

      $db = Util::DB();

      $username = stripslashes($username);
      $password = stripslashes($password);

      $password_hash = hash('sha256', $password);

      $query_skeleton = $db->prepare("SELECT * FROM user WHERE username=:username AND password=:password");

      $query = $query_skeleton->execute(array(
        "username" => $username,
        "password" => $password_hash
      ));

      $row = $query_skeleton -> fetch(\PDO::FETCH_ASSOC);

      if($row)
        return true;

      else
        return false;
    }

    public static function Admin($username) {

      $db = Util::DB();

      $query_skeleton = $db->prepare("SELECT admin FROM user WHERE username=:username");

       $query_skeleton->execute(array(
        "username" => $username

      ));

      $row = $query_skeleton->fetch(\PDO::FETCH_ASSOC);

      if($row['admin'] == 1)
        return 1;

      else
        return ;
    }
  }
 ?>
