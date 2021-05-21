<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="singlePostContainer">
  <a href="<?php echo URLROOT; ?>/posts" class="btn-main padding-btn btn-text-3"><i class="fa fa-backward"></i> Back</a>
  <div class="addPostContainer">
    <h2 class="form-header text-bg margin-1 padding">Edit Post</h2>
   
    <!-- Submitting the post by it's ID -->
    <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">
      <div class="flex-column padding">
        <label class="form_label margin-1" for="title">Title: <sup>*</sup></label>
        <input type="text" name="title" class="input" value="<?php echo $data['title']; ?>">
        <span class="invalid-feedback"><?php echo !empty($data['title_err']) ? $data['title_err'] : ''; ?></span>
      </div>
      <div class="flex-column padding">
        <label class="form_label margin-1" for="body">Body: <sup>*</sup></label>
        <textarea name="body" class="input"><?php echo $data['body']; ?></textarea>
        <span class="invalid-feedback"><?php echo !empty($data['body_err']) ?  $data['body_err'] : ''; ?></span>
      </div>
      <input type="submit" class="btn-main" value="Submit">
    </form>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>