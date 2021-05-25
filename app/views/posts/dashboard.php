<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="flex-row db-heading">
    <h2>Your Posts</h2>
    <div class=""><a href="<?php echo URLROOT; ?>/posts/add" class="btn-main btn-text-2"><i class="fas fa-pencil-alt"></i>Add Post</a></div>
  </div>
  
<div class="postContainer">
<!-- Flash message if post added  -->
  <h3><?php flash('post_message'); ?></h3>

  <!-- Looping through the posts array and display them -->
  <?php foreach($data['userPosts'] as $userPost) : ?>

    <article class="card">
      <div class="article__header"><img  src="<?php echo URLROOT; ?>/img/drawers.jpg"/></div>
        <div class="article__info--container">
          <h2 class="article__title"><?php echo $userPost->title; ?></h2>
          <p class="article__summary"><?php echo $userPost->body; ?></p>
          <div class="card__footer">
            <div class="author">
              <div class="profile-picture">
                <img src="<?php echo URLROOT; ?>/img/avatar-michelle.jpg" alt="Author profile picture"/>
              </div>
            </div>
            <!-- Making sure that the logged in user can modify only there posts  -->
            <?php if($userPost->user_id == $_SESSION['user_id']) : ?>
              <form class="db-form" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $userPost->id; ?>" method="post">
                <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $userPost->id; ?>" class="more_link">Edit</a>
                <input class="more_link" type="submit" value="Delete">
              </form>
            <?php endif; ?>
          </div>
        </div>
    </article>

  <?php endforeach; ?>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>