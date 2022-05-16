<?php

/**
 * Template part for displaying hero banner
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hctc
 */

$acf = get_field($args['id'], 'options');
?>

<section class="l-section--restrict-width  l-section--content-wrapper ">
  <div class='c-portfolio-projects js-pagination'>
    <?php
    foreach ($acf as $item) :
    ?>
      <div class='c-portfolio-projects__item js-pagination-item'>
        <h5 class='c-portfolio-projects__item-title'>
          <?php echo $item['title']; ?>
        </h5>
        <span class='c-portfolio-projects__item-subtitle'>
          <?php echo $item['subtitle']; ?>
        </span>
      </div>
    <?php endforeach; ?>
  </div>
  <button class='c-btn c-btn--secondary c-portfolio-projects__btn js-pagination-read-more'><i class='las la-angle-double-down'></i>zobacz więcej</button>
</section>