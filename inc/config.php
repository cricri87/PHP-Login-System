<?php
// if there is no constant defined called, __CONFIG__, do not load this file
  if(!defined('__DEFINED__')){
    exit('You do not have a config file');
  }

  // our config is below

  // Include the DB.php file
  include_once "classes/DB.php";
  $con = DB::getConnection();
?>
