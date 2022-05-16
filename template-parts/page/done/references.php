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
  <div class='c-portfolio-references js-pagination'>
    <?php
    foreach ($acf as $item) :
    ?>
      <div class='c-portfolio-references__item js-pagination-item'>
        <div class='c-portfolio-references__item-short'>
          <?php echo $item['short']; ?>
        </div>
        <div class='c-portfolio-references__item-description'>
          <?php echo $item['description']; ?>
        </div>
        <?php if ($item['media']) : ?>
          <button class='c-portfolio-references__item-btn js-modal-trigger'>czytaj więcej</button>
          <div class='c-portfolio-references__item-modal c-portfolio-references__item-img js-modal-content'>
            <div>
              <img src="<?php echo $item['media']['url']; ?>" alt="">
              <button class='js-modal-close'>Zamknij<i class='las la-times-circle'></i></button>
            </div>
          </div>
        <?php endif; ?>
        <div class='c-portfolio-references__item-author'>
          <span class='c-portfolio-references__item-decor'>
          </span>
          <h5 class='c-portfolio-references__item-title'>
            <?php echo $item['title']; ?>
          </h5>
          <span class='c-portfolio-references__item-subtitle'>
            <?php echo $item['subtitle']; ?>
          </span>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <button class='c-btn c-btn--secondary c-portfolio-references__btn js-pagination-read-more'><i class='las la-angle-double-down'></i>zobacz więcej</button>
</section>