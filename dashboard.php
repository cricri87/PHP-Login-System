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

  $user_id = $_SESSION['user_id'];
  $getUserInfo = $con->prepare("SELECT email, reg_time FROM users WHERE user_id = :user_id LIMIT 1");
  $getUserInfo->bindParam(":user_id", $user_id, PDO::PARAM_INT);
  $getUserInfo->execute();

  if($getUserInfo->rowCount() == 1) {
    // user was found
    $user = $getUserInfo->fetch(PDO::FETCH_ASSOC);

  }else {
    // user is not signed in
    header("Location: PHP-login-system/logout.php");exit;
  }

  $date = $user['reg_time'];
  $date = date("d-m-Y", strtotime($date));

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
      <h1>Dashboard</h1>
      <p>Hello <?php echo $user['email'];?>, You registered at <?php echo $date;  ?></p>
    <a href="PHP-login-system/logout.php">Logout</a>

    </div>


    <?php require_once "inc/footer.php"; ?>


