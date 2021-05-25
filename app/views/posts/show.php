<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="singlePostContainer">
  <a href="<?php echo URLROOT; ?>/posts" class="btn-main padding-btn btn-text-3"><i class="fa fa-backward"></i>     Back</a>
  <br>
  <h2><?php echo $data['post']->title; ?></h2>
  <div class="margin-1 padding-1">
    Written by <?php echo $data['user']->name; ?> on <?php echo $data['post']->created_at; ?>
  </div>
  <p class="margin-1 padding-1"><?php echo $data['post']->body; ?></p>

  <!-- Making sure that the logged in user can modify only there posts  -->

  <?php if($data['post']->user_id == $_SESSION['user_id']) : ?>


    <form class="flex-row" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
      <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn-main padding-btn btn-text-2">Edit</a>
      <input type="submit" value="Delete" class="btn-main padding-btn btn-text-1 ">
    </form>
  <?php endif; ?>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>