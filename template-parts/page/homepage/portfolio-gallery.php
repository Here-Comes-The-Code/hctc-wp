<?php

/**
 * Template part for displaying hero banner
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hctc
 */

$acf = get_field('homepage', 'options')['portfolio-gallery'];
$decor = $acf['media']['decor'];
$images = $acf['media']['images'];
$bg = $acf['bg'];
?>

<section class="l-section--content-wrapper-fw ">
  <div class='c-portfolio-gallery'>
    <img class='c-portfolio-gallery--bg' src="<?php echo $bg['url'] ?>" alt="">
    <div class='c-portfolio-gallery--line-decor-top'></div>
    <div class="c-portfolio-gallery__items l-section--restrict-width">
      <?php
      $counter =  0;
      foreach ($acf['portfolio-item'] as $key => $item): ?>
        <?php $counter++; ?>
        <a class='c-portfolio-gallery__item' href="<?php echo $item['url']['url'] ?>">
          <img class='js-parallax c-portfolio-gallery__item-img' src="<?php echo $item['img']['url'] ?>" alt="">
          <div class='c-portfolio-gallery__item-txt c-portfolio-gallery__item-txt--<?php echo $counter ?>'>
            <?php echo $item['title'] ?>
          </div>
        </a>
      <?php
      endforeach;
      ?>
    </div>
    <div class='c-portfolio-gallery--line-decor-bottom'></div>

  </div>

</section>