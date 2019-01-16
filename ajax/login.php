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
   $userFound = findUser($con, $email, true);

   if($userFound) {

    $user_id['user_id'] = (int) $userFound['user_id'];
    $hash = $userFound['password'];

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

  echo json_encode($return, JSON_PRETTY_PRINT);exit;

  }else {
    // die kill the script and redirect
    exit('Invalid URL');
  }

