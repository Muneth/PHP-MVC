<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="containerMain">
    <section id="hero">
    <div>
        <h2 class="form-header text-bg-animation"><?php echo $data['title']; ?></h2>
        <p>
            <span
              class="txt-type"
              data-wait="1000"
              data-words='["MVC", "Blog", "Application"]'
            ></span
            ><span class="cursor-blink"></span>
          </p>
        <p><?php echo $data['description']; ?></p>
        <p>Version: <strong><?php echo APPVERSION; ?></strong></p>
    </div>
    </section>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
