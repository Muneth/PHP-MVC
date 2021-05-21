<?php

// require_once dirname( __FILE__ ) . '/../../vendor/autoload.php';

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();

  // DataBase Parameters 
  define('DB_HOST', "eu-cdbr-west-01.cleardb.com");
  define('DB_USER', "b9d2f5cfa78a4f");
  define('DB_PASS', "e9d53afa");
  define('DB_NAME', " heroku_a87f4efffbb8531");

  // Getting App Root - dirname() - gives the parent folder path 
  // Setting it to - Const APPROOT
  define('APPROOT', dirname(dirname(__FILE__)));
  // URL Root
  define('URLROOT', 'https://posty-mvc.herokuapp.com/posty-mvc-crud');
  // Site Name
  define('SITENAME', 'Posty');
  // App Version
  define('APPVERSION', '1.0.0');
