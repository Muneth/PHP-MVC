<?php

  // namespace Posty\libraries\Controller;
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
    // Empty array for dynamic values passed in views
    public function view($view, $data = []){
      // Check for view file
      if(file_exists('../app/views/' . $view . '.php')){
        require_once '../app/views/' . $view . '.php';
      } else {
        // View does not exist
        die('View does not exist');
      }
    }
  }