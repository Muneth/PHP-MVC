<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="formContainer">
  <div class="formCard">
    <!-- Custom flash message from session_helper -->
    <?php flash('register_success'); ?>
    <h2 class="form-header text-bg">Login</h2>
    <!-- <p>Please fill in your credentials to log in</p> -->
    <form action="<?php echo URLROOT; ?>/users/login" method="post">
      <div class="flex-column padding">
        <label class="form_label" for="email">Email: <sup>*</sup></label>
        <input
          type="email"
          name="email"
          class="input"
          value="<?php echo $data['email']; ?>"
        />
        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
      </div>

      <div class="flex-column padding">
        <label class="form_label" for="password">Password: <sup>*</sup></label>
        <input type="password" name="password" class="input" value="<?php echo $data['password']; ?>" />
        <span class="invalid-feedback"
          ><?php echo $data['password_err']; ?></span
        >
      </div>

      <div class="padding loginRegisterBtn">
        <div class="padding-btn">
          <input class="btn padding-btn" type="submit" value="login" />
        </div>
        <div class="btn padding-btn">
          <a href="<?php echo URLROOT; ?>/users/register" class="btn-link"
            >No account? Register</a
          >
        </div>
      </div>
    </form>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
