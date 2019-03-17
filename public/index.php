<?php

  require_once __DIR__ ."/../vendor/autoload.php";

  Toro::serve(array(
    "/"                             => "Controllers\\HomeController",
    "/login"                        => "Controllers\\LoginController",
    "/logout"                       => "Controllers\\LogoutController",
    "/signup"                       => "Controllers\\SignupController",
    "/problems"                     => "Controllers\\ProblemsController",
    "/problem/([0-9]+)"             => "Controllers\\ProblemController",
    "/admin"                        => "Controllers\\AdminController",
    "/edit/([0-9]+)"                => "Controllers\\EditController",
    "/addq"                         => "Controllers\\AddController",
    "/leaderboard"                  => "Controllers\\LeaderboardController",
    "/profile"                      => "Controllers\\ProfileController",
    "/submit/([0-9]+)"              => "Controllers\\SubmitController",
    "/otherprofile/([A-Za-z]+)"     => "Controllers\\OtherProfileController"
    ))

?>
