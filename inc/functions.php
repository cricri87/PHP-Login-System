<?php
// force the user to be logged in or else redirect to login
  function forceLogin() {

    if(isset($_SESSION['user_id'])) {
      // the user is aloud here
    }else {
      // the user has to be logged in
      header('Location: login.php');exit;
    }
  }

  function forceDashboard() {

    if(isset($_SESSION['user_id'])) {
      // the user is aloud here
      header('Location: dashboard.php');exit;
    }else {
      // the user has to be logged in

    }
  }

  function findUser($con, $email, $return_assoc = false) {
    $email = (string) Filter::String($email);
    $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
   $findUser->bindParam(':email', $email, PDO::PARAM_STR);
   $findUser->execute();

   if($return_assoc) {
    return $findUser->fetch(PDO::FETCH_ASSOC);
   }

   if($findUser->rowCount() == 1) {
    return true;
   }else {
    return false;
   }
  }



?>
