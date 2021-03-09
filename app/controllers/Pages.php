<?php

  // Default Conroller which Extends the Base Controller from libraries

  class Pages extends Controller {
    public function __construct(){
     
    }

    // Default method which run with default Controller - Pages
    // Loading the view - index.php
    public function index(){
      if(isLoggedIn()){
        redirect('posts');
      }

      // Defining an object for the view - index.php

      $data = [
        'title' => 'Posty',
        'description' => 'MVC framework APP'
      ];
     
      $this->view('pages/index', $data);
    }

    // Loading the view about.php
    public function about(){
      // Defining an object for the view - about.php
      $data = [
        'title' => 'About Us',
        'description' => 'App to share posts with other users'
      ];

      $this->view('pages/about', $data);
    }

    public function contact(){
      // Defining an object for the view - about.php
      $data = [
        
      ];

      $this->view('pages/contact', $data);
    }
  }