<header>
  <nav>
    <div id="logo">
      <a class="text-bg-animation" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
    </div>
    <ul class="nav-links">
      <div class="flex-row">
        <li><a title="Home Page" href="<?php echo URLROOT; ?>">Home</a></li>
        <li><a title="About Page" href="<?php echo URLROOT; ?>/pages/about">About</a></li>
      </div>
      <div class="cursor-blink"></div>
      <div class="cursor-blink"></div>
      <div class="flex-row">
      <!-- If the user id is in the session then show these nav items  -->
        <?php if (isset($_SESSION['user_id'])) : ?>
      <!-- Displaying loggedIn User -->
          <li><?php echo ucwords(explode(' ',$_SESSION['user_name'])[0]); ?></li>
          <li><a title="dashboard - user's posts" href="<?php echo URLROOT; ?>/posts/dashboard">Dashboard</a></li>
          <li><a href="<?php echo URLROOT; ?>/users/logout">Logout</a></li>
      <!-- Otherwise show these nav items  -->
        <?php else : ?>
          <li><a title="User Registration Page" href="<?php echo URLROOT; ?>/users/register">Register</a></li>
          <li><a title="User Login Page" href="<?php echo URLROOT; ?>/users/login">Login</a></li>
        <?php endif; ?>
      </div>
    </ul>
    <div class="burger">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div>
  </nav>
</header>
<div id="marginBottom"></div>
