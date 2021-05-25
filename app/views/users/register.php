<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="formContainer">
  <div class="formCard">
  <h2 class="form-header text-bg">Create An Account</h2>
    <form action="<?php echo URLROOT; ?>/users/register" method="post">
      <div class="flex-column padding">
        <label class="form_label" for="name">Name: <sup>*</sup></label>
        <input type="text" name="name" class="input" value="<?php echo $data['name']; ?>"/>
        <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
      </div>

      <div class="flex-column padding">
        <label class="form_label" for="email">Email: <sup>*</sup></label>
        <input type="email" name="email" class="input" value="<?php echo $data['email']; ?>"/>
        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
      </div>
      <div class="flex-column padding">
        <label class="form_label" for="password">Password: <sup>*</sup></label>
        <input type="password" name="password" class="input" value="<?php echo $data['password']; ?>" />
        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
      </div>
      <div class="flex-column padding">
        <label class="form_label" for="confirm_password">Confirm Password: <sup>*</sup></label>
        <input type="password" name="confirm_password" class="input" value="<?php echo $data['confirm_password']; ?>"/>
        <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
      </div>
      <div class="padding loginRegisterBtn">
        <div class="padding-btn">
          <input class="btn padding-btn" type="submit" value="Register" />
        </div>
        <div class="btn padding-btn">
          <a href="<?php echo URLROOT; ?>/users/login" class="btn-link">Have an account? Login</a>
        </div>
      </div>
    </form>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
