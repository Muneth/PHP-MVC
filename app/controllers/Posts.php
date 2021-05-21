<?php
  class Posts extends Controller {

    // Making sure only LoggedIn user can access the post functionality
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      // Loading the Models 
      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
    }

    public function index(){
      // Getting posts by getPosts() in postModel and setting it to a variable
      $posts = $this->postModel->getPosts();

      $data = [
        'posts' => $posts
      ];

      $this->view('posts/index', $data);
    }

    public function dashboard(){
      $userPosts = $this->postModel->getPostsByUserId();
      
      $data = [
        'userPosts' => $userPosts,
      ];

      $this->view('posts/dashboard', $data);
    }

    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // init data
        $data = [
          'title' => htmlspecialchars(trim($_POST['title'])),
          'body' =>  htmlspecialchars(trim($_POST['body'])),
          'user_id' => $_SESSION['user_id'],
          'title_err' => '',
          'body_err' => ''
        ];

        // Validate data
        if(empty($data['title'])){
          $data['title_err'] = 'Please enter title';
        }
        if(empty($data['body'])){
          $data['body_err'] = 'Please enter body text';
        }

        // Make sure there are no errors and then validate
        // flash message if post added 
        // Redirect to posts 
        if(empty($data['title_err']) && empty($data['body_err'])){
          
          if($this->postModel->addPost($data)){
            flash('post_message', 'Post Added');
            redirect('posts/dashboard');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('posts/add', $data);
        }

      } else {
        $data = [
          'title' => '',
          'body' => ''
        ];
  
        $this->view('posts/add', $data);
      }
    }

    // Edit
    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'id' => $id,
          'title' => htmlspecialchars(trim($_POST['title'])),
          'body' => htmlspecialchars(trim($_POST['body'])),
          'user_id' => $_SESSION['user_id'],
          'title_err' => '',
          'body_err' => ''
        ];

        // Validate data
        if(empty($data['title'])){
          $data['title_err'] = 'Please enter title';
        }
        if(empty($data['body'])){
          $data['body_err'] = 'Please enter body text';
        }

        // Make sure there are no errors and then validate
        // flash message if post edited
        // Redirect to dashboard 
        if(empty($data['title_err']) && empty($data['body_err'])){
  
          if($this->postModel->updatePost($data)){
            flash('post_message', 'Post Updated');
            redirect('posts/dashboard');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('posts/edit', $data);
        }

      } else {
        // Get existing post from model
        $post = $this->postModel->getPostById($id);

        // Check for owner of the post
        // Logged In user can't EDIT other user's post by accessing it from URL
        if($post->user_id != $_SESSION['user_id']){
          redirect('posts');
        }

        $data = [
          'id' => $id,
          'title' => $post->title,
          'body' => $post->body
        ];
  
        $this->view('posts/edit', $data);
      }
    }

    // Fetching user and post by ID
    // Displaying single post page - show.php
    public function show($id){
      $post = $this->postModel->getPostById($id);
      $user = $this->userModel->getUserById($post->user_id);

      $data = [
        'post' => $post,
        'user' => $user
      ];

      $this->view('posts/show', $data);
    }

    // Deleting post 
    // Fetching by ID
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        // Get existing post from model
        $post = $this->postModel->getPostById($id);
        
        // Check for owner
        if($post->user_id != $_SESSION['user_id']){
          redirect('posts');
        }

        if($this->postModel->deletePost($id)){
          flash('post_message', 'Post Removed');
          redirect('posts/dashboard');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('posts');
      }
    }
  }