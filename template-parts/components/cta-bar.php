<?php

/**
 * Template part for displaying hero banner
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hctc
 */

$acf_options = get_field($args['page'], 'options');
$acf = $acf_options[$args['id']];
?>

<div class='c-cta-bar'>
  <div class="c-cta-bar__content">
    <?php echo $acf['msg'] ?>
  </div>
  <div class="c-cta-bar__btns">
    <?php
    $counter = 0;
    foreach ($acf['btns'] as $key => $btn) : ?>
      <a class='c-cta-bar__btn c-btn <?php
                                      if ($counter == 0) {
                                        echo 'c-btn--primary';
                                      } else {
                                        echo 'c-btn--secondary';
                                      }
                                      $counter++;
                                      ?> ' href='<?php echo $btn['btn']['url']; ?>' target='<?php echo $btn['btn']['target']; ?>'>
        <?php echo $btn['btn']['title']; ?>
        <i class='<?php echo $btn['icon-class'] ?>'></i>
      </a>
    <?php endforeach; ?>

  </div>
</div>