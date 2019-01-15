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
   // $email = strtolower($email); using mysql to do it LOWER

   // make sure the user do not exist
   $findUser = $con->prepare("SELECT user_id FROM users WHERE email = LOWER(:email) LIMIT 1");
   $findUser->bindParam(':email', $email, PDO::PARAM_STR);
   $findUser->execute();

   if($findUser->rowCount() == 1) {
    // user exist
    // we can check if they are able to log in
    $return['error'] = "You already have an account";
    $return['is_logged_in'] = false;

   }else {
    // user do not exist, add them now

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $addUsers = $con->prepare("INSERT INTO users(email, password) VALUES (LOWER(:email), :password)");
    $addUsers->bindParam(':email', $email, PDO::PARAM_STR);
    $addUsers->bindParam(':password', $password, PDO::PARAM_STR);
    $addUsers->execute();

    $user_id = $con->lastInsertId();
    $_SESSION['user_id'] = (int) $user_id;

    $return['redirect'] = 'PHP-Login-System/dashboard.php';
    $return['is_logged_in'] = true;

   }

   // make sure the user can be added and is added

   // return the proper information back to javascript to redirect us

   $return['name'] = 'Christian Rognstad';

  echo json_encode($return, JSON_PRETTY_PRINT);exit;




  }else {
    // die kill the script and redirect
    exit('Invalid URL');
  }

