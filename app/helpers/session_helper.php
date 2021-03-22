
<?php

  session_start();

  // Flash message helper
  // EXAMPLE - flash('register_success', 'You are now registered');
  // DISPLAY IN VIEW - echo flash('register_success');

  // Function to store flash messages in key-value pairs with classes
  function flash($name = '', $message = '', $class = 'alert alert-success'){
    if(!empty($name)){
      if(!empty($message) && empty($_SESSION[$name])){
        if(!empty($_SESSION[$name])){

          // if there is already a message in the $name then unsetting it 
          unset($_SESSION[$name]);
        }

        // if there is already a class attached to the $name then unsetting it 
        if(!empty($_SESSION[$name. '_class'])){
          unset($_SESSION[$name. '_class']);
        }

        // Storing the message in $name & concacting with the class name
        $_SESSION[$name] = $message;
        $_SESSION[$name. '_class'] = $class;


      } elseif(empty($message) && !empty($_SESSION[$name])){
        
        // if there is a class in the $name then adding to the $class
        $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';

        // Display the message with class 
        echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';

        // Unsetting everything
        unset($_SESSION[$name]);
        unset($_SESSION[$name. '_class']);
      }
    }
  }

  // Checking if the User is logged in or not 

  function isLoggedIn(){
    if(isset($_SESSION['user_id'])){
      return true;
    } else {
      return false;
    }
  }
