<?php

  define('__DEFINED__', true);
  require_once "../inc/config.php";


  if($_SERVER['REQUEST_METHOD']== 'POST') {
  header('Content-Type: application/json');

   $return = [];

   // make sure the user do not exist

   // make sure the user can be added and is added

   // return the proper information back to javascript to redirect us

   $return['redirect'] = 'PHP-Login-System/dashboard.php';
   $return['name'] = 'Christian Rognstad';

  echo json_encode($return, JSON_PRETTY_PRINT);exit;




  }else {
    // die kill the script and redirect
    exit('test');
  }

