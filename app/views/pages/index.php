<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="jumbotron jumbotron-flud text-center bg-success">
    <div class="container">
    <h1 class="display-1 font-weight-normal"><?php echo $data['title']; ?></h1>
    <br>
    <p class="h3 "><?php echo $data['description']; ?></p>
    </div>
  </div> 
  <div id="body">
        <!-- <h1>My Blog</h1> -->
        <div class="filter-container">
            <input type="text" id="filter" class="filter" placeholder="Filter posts...">
        </div>
        
        <div id="posts-container">
            <!-- Dynamically inserted POSTS -->
        </div>
    
        <div class="loader">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
