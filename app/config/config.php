<?php

// require_once dirname( __FILE__ ) . '/../../vendor/autoload.php';

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();

  // DataBase Parameters 
  define('DB_HOST', "localhost");
  define('DB_USER', "root");
  define('DB_PASS', "");
  define('DB_NAME', "shareposts");

  // Getting App Root - dirname() - gives the parent folder path 
  // Setting it to - Const APPROOT
  define('APPROOT', dirname(dirname(__FILE__)));
  // URL Root
  define('URLROOT', 'http://localhost/posty-mvc-crud');
  // Site Name
  define('SITENAME', 'Posty');
  // App Version
  define('APPVERSION', '1.0.0');