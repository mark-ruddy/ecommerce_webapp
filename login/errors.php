<?php if (count($error_arr) > 0) : ?>
  <div class="error">
    <?php foreach ($error_arr as $error) : ?>
      <p><?php echo $error ?></p>
    <?php endforeach ?>
  </div>
<?php endif ?>
