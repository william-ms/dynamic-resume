<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/360805e100.js" crossorigin="anonymous"></script>
    <link id="link" rel="stylesheet" href="<?php echo CSS_PATH; ?>index.css" />
  </head>

  <body>
    <header>
      <?php include_partial('partials/header') ?>
    </header>

    <section class="content">
      <div class="container">
        <?php include_view($view) ?>
      </div>
    </section>

    <script src="/assets/js/index.js"></script>
  </body>
</html>