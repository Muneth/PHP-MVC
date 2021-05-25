<?php

  // Default Conroller which Extends the Base Controller from libraries

  class Pages extends Controller {
    
    public function __construct(){}
    
    // Default method which run with default Controller - Pages
    // Loading the view - index.php with data object
    // If Logged in then redirect to posts as home 
    public function index(){
      if(isLoggedIn()){
        redirect('posts');
      }

      $data = [
        'title' => 'Posty',
        'description' => 'MVC framework APP'
      ];
     
      $this->view('pages/index', $data);
    }

    // Loading the view about.php with data object
    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'App to share posts with other users'
      ];

      $this->view('pages/about', $data);
    }
  }