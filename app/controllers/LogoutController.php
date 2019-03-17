<?php

namespace Controllers;
session_start();

class LogoutController {

      public function __construct() {
        session_destroy();
        header("Location: /");
      }
}

?>
