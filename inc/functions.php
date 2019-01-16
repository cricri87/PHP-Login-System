<?php
// force the user to be logged in or else redirect to login
  function forceLogin() {

    if($_SESSION['user_id']) {
      // the user is aloud here
    }else {
      // the user has to be logged in
      header('Location: login.php');exit;
    }
  }

  function forceDashboard() {

    if($_SESSION['user_id']) {
      // the user is aloud here
      header('Location: dashboard.php');exit;
    }else {
      // the user has to be logged in

    }
  }



?>
