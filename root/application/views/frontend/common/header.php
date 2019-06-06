<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <?php if ($css && count($css) > 0): ?>
      <?php foreach($css as $value): ?>
      <link rel="stylesheet" type="text/css" href='<?php echo base_url() . "css/${value}"; ?>'>
      <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($js && count($js) > 0): ?>
      <?php foreach($js as $value): ?>
        <script type='text/javascript' src='<?php echo base_url() . "js/${$value}"; ?>'></script>
      <?php endforeach; ?>
    <?php endif; ?>

    <title><?php echo $title ? $title : ''; ?></title>
  </head>
  <body>