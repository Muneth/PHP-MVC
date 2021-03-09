<?php
  // Load Config
  require_once 'config/config.php';
  // Load Helpers
  require_once 'helpers/url_helper.php';
  require_once 'helpers/session_helper.php';


  // Autoloader to require Core Libraries automaticly
  // It is better than requiring all files one by one 
  // the function works only if the classname is same as the file name
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });
  
