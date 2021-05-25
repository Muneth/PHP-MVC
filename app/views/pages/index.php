<?php require APPROOT . '/views/inc/header.php'; ?>
  <section class="hero">
    <div>
        <h1 class="title text-bg-animation"><?php echo $data['title']; ?></h1>
        <p>
            <span
              class="txt-type"
              data-wait="1000"
              data-words='["MVC", "Blog", "Application"]'
            ></span
            ><span class="cursor-blink"></span>
          </p>
    </div>
  </section>
<?php require APPROOT . '/views/inc/footer.php'; ?>
