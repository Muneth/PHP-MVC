<?php require APPROOT . '/views/inc/header.php'; ?>
  <main class="hero">
    <div>
        <h2 class="form-header text-bg-animation"><?php echo $data['title']; ?></h2>
        <p><?php echo $data['description']; ?></p>
        <p>Version: <strong><?php echo APPVERSION; ?></strong></p>
    </div>
  </main>
<?php require APPROOT . '/views/inc/footer.php'; ?>
