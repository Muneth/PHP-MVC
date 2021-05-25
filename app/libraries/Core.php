<?php
  /*
   * App Core Class
   * Creates URL & loads Core controller
   * URL FORMAT - /controller/method/params
   */

  // Default Controller, Default method and Empty array for parameters...

  class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){

      // Defining the method to get the URL values
      $url = $this->getUrl();

      // Checking for controller
      // Capitalizing the first letter of value at index[0] in url and concactinating with .php 
      if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
        // If exists, set as controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 Index
        unset($url[0]);
      }

      // Require the controller
      require_once '../app/controllers/'. $this->currentController . '.php';

      // Instantiate controller class
      $this->currentController = new $this->currentController;

      // Check index[1] in url 
      if(isset($url[1])){
        // Check to see if method exists in controller to match the value in URL array at index[1]
        // if there is a method then setting that as an current method, otherwise it will run the default method - index();
        if(method_exists($this->currentController, $url[1])){
          $this->currentMethod = $url[1];
          // Unset 1 index
          unset($url[1]);
        }
      }

      // Get params
      $this->params = $url ? array_values($url) : [];

      // Call a callback with array of params
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }


    // Getting the values from URL
    // Then stripping the ('/')
    // Then filtering & Sanatizing the URL value
    // Then breaking the url values as an array

    public function getUrl(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
      else return [''];
    }
  } 
  
  