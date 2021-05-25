<?php require APPROOT . '/views/inc/header.php'; ?>

<div id="postContainer" class="postContainer">
<!-- Flash message if post added  -->
  <?php flash('post_message'); ?>


  <!-- Looping through the posts array and display them -->
  <?php foreach($data['posts'] as $post) : ?>

    <article class="card">
      <div class="article__header"><img  src="<?php echo URLROOT; ?>/img/drawers.jpg"/></div>
        <div class="article__info--container">
          <h2 class="article__title"><?php echo $post->title; ?></h2>
          <p class="article__summary"><?php echo $post->body; ?></p>
          <div class="card__footer">
            <div class="author">
              <div class="profile-picture">
                <img src="<?php echo URLROOT; ?>/img/avatar-michelle.jpg" alt="Author profile picture"/>
              </div>
              <div class="author__info">
                <div class="name"> <?php echo $post->name; ?></div>
                <div class="date"><?php echo $post->postCreated; ?></div>
              </div>
            </div>
            <button class="share-btn">
              <img class="btn-img" src="<?php echo URLROOT; ?>/img/icon-share.svg" alt="Share button" />
            </button>
            <a class="more_link" href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>">More</a>
          </div>
        </div>
        <div class="share-footer">
        <p>SHARE</p>
        <a href="https://www.facebook.com/"
          ><img src="<?php echo URLROOT; ?>/img/icon-facebook.svg" alt="Facebook icon"
        /></a>
        <a href="https://twitter.com/?lang=fr"
          ><img src="<?php echo URLROOT; ?>/img/icon-twitter.svg" alt="Twitter icon" /></a
        ><a href="https://www.pinterest.fr/"
          ><img src="<?php echo URLROOT; ?>/img/icon-pinterest.svg" alt="Pinterest icon"
        /></a>
        <button class="share-btn">
          <img src="<?php echo URLROOT; ?>/img/icon-share-white.png" alt="Share button" />
        </button>
      </div>
      <div class="share-popup">
        <p>SHARE</p>
        <a href="https://www.facebook.com/"
          ><img src="<?php echo URLROOT; ?>/img/icon-facebook.svg" alt="Facebook icon"
        /></a>
        <a href="https://twitter.com/?lang=fr"
          ><img src="<?php echo URLROOT; ?>/img/icon-twitter.svg" alt="Twitter icon" /></a
        ><a href="https://www.pinterest.fr/"
          ><img src="<?php echo URLROOT; ?>/img/icon-pinterest.svg" alt="Pinterest icon"
        /></a>
      </div>
    </article>
  
  <?php endforeach; ?>

  <div class="loader">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
  </div>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

