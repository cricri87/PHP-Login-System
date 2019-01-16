<?php
// Allowe the config require the config
// define('__DEFINED__', true);
//   require_once "inc/config.php";
//   require_once "inc/defined.php";

  // Allow the config
  define('__CONFIG__', true);
  // Require the config
  require_once "inc/config.php";



  forceLogin();

  // print_r($_SESSION['user_id']) . " is your user id";
  // foreach ($_SESSION['user_id'] as $key) {
  //   echo $key . " is your user id";
  //   # code...
  // }
  // exit;
   ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="follow">

    <title>Page Title</title>

    <base href="/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css" />
  </head>

  <body>

    <div class="uk-section uk-container">
      <h1>Hello Dashboard you are user: <?php foreach($_SESSION['user_id'] as $user_id){
        echo $user_id;
      } ?>

      </h1>
    </div>

    <?php require_once "inc/footer.php"; ?>


