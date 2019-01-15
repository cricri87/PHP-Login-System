<?php

// Allow the config
  define('__CONFIG__', true);

  // Require the config
  require_once "../inc/config.php";

  // define('__DEFINED__', true);
  // require_once "../inc/config.php";


  if($_SERVER['REQUEST_METHOD']== 'POST') {
  header('Content-Type: application/json');

   $return = [];

   $email = Filter::String($_POST['email']);
   $password = $_POST['password'];
   // $email = strtolower($email); using mysql to do it LOWER

   // make sure the user do not exist
   $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
   $findUser->bindParam(':email', $email, PDO::PARAM_STR);
   $findUser->execute();

   if($findUser->rowCount() == 1) {
    // user exist
    // try to log them in
    // we can check if they are able to log in
    $user = $findUser->fetch(PDO::FETCH_ASSOC);
    $user_id['user_id'] = (int) $user['user_id'];
    $return['error'] = "You already have an account";

    $hash = $user['password'];
    if(password_verify($password, $hash)) {
      // user is signed in
      $return['redirect'] = 'PHP-Login-System/dashboard.php';
      $_SESSION['user_id'] = $user_id;
    }else {
      // user invalid
      $return['error'] = "Invalid Email or Password";
    }

   }else {
    // user do not exist, make them registrate
    $return['error'] = "You do not have an account. <a href='PHP-Login-System/register.php'>Create one now</a>";
   }

   // make sure the user can be added and is added

   // return the proper information back to javascript to redirect us

   $return['name'] = 'Christian Rognstad';

  echo json_encode($return, JSON_PRETTY_PRINT);exit;

  }else {
    // die kill the script and redirect
    exit('Invalid URL');
  }

