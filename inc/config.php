<?php
// if there is no constant defined called, __CONFIG__, do not load this file
  // if(!defined('__DEFINED__')){
  //   exit('You do not have a config file');
  // }
  // If there is no constant defined called __CONFIG__, do not load this file
  if(!defined('__CONFIG__')) {
    exit('You do not have a config file');
  }

  // Session is always turned on
  if(!isset($_SESSION)) {
    session_start();

  }
  // our config is below

  error_reporting(-1);
  ini_set('display_errors', 'on');

  // Include the DB.php file
  include_once "classes/DB.php";
  include_once "classes/filter.php";
  include_once "functions.php";
  $con = DB::getConnection();
?>
