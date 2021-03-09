<?php
  /*
   * Base Controller
   * Loads the models and views in the other controllers   * 
   */

  class Controller {
    // Load models from model folder 
    public function model($model){
      // Require model file
      require_once '../app/models/' . $model . '.php';

      // Instatiate model
      return new $model();
    }

    // Load views from views folder 
    // Setting an empty array which will represent the dynamic values which are passed in views, even if it is hard coded or from database
    public function view($view, $data = []){
      // Check for view file
      // Requiring the file & if it doesn't exist then it will stop the app
      if(file_exists('../app/views/' . $view . '.php')){
        require_once '../app/views/' . $view . '.php';
      } else {
        // View does not exist
        die('View does not exist');
      }
    }
  }