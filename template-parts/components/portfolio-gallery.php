<?php

/**
 * Template part for displaying hero banner
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hctc
 */

$acf = get_field($args['page'], 'options')[$args['id']];
$decor = $acf['media']['decor'];
$images = $acf['media']['images'];
$bg = $acf['bg'];
?>
<section class="l-section--content-wrapper-fw ">
  <div class='c-portfolio-gallery <?php if ($args['variant']) : ?>c-portfolio-gallery--<?php echo $args['variant'];
                                                                                      endif; ?>'>
    <?php if ($bg) : ?>
      <img class='c-portfolio-gallery--bg' src="<?php echo $bg['url'] ?>" alt="">
    <?php endif; ?>
    <?php if (!$args['variant']) : ?>
      <div class='c-portfolio-gallery--line-decor-top'></div>
    <?php endif; ?>
    <div class="c-portfolio-gallery__items l-section--restrict-width">
      <?php
      $items;
      if ($args['item_id']) {
        $items = $acf[$args['item_id']];
      } else {
        $items = $acf;
      }
      $counter =  0;
      foreach ($items as $key => $item) : ?>
        <?php $counter++; ?>
        <?php
        if ($item['url']) :
        ?>
          <a class='c-portfolio-gallery__item' href="<?php echo $item['url']['url'] ?>">
          <?php endif; ?>
          <?php if (!$item['url']) : ?>
            <div class='c-portfolio-gallery__item'>
            <?php endif; ?>
            <div class='c-portfolio-gallery__item-img'>
              <img class='js-parallax ' src="<?php echo $item['img']['url'] ?>" alt="">
            </div>
            <div class='c-portfolio-gallery__item-txt c-portfolio-gallery__item-txt--<?php echo $counter ?>'>
              <?php if ($item['title']) : ?>
                <div class='c-portfolio-gallery__item-title'>
                  <?php echo $item['title'] ?>
                </div>
              <?php endif; ?>
              <?php if ($item['description']) : ?>
                <div class='c-portfolio-gallery__item-description'>
                  <?php echo $item['description'] ?>
                </div>
              <?php endif; ?>
            </div>
            <?php if (!$item['url']) : ?>
            </div>
          <?php endif; ?>
          <?php
          if ($item['url']) :
          ?>
          </a>
        <?php endif; ?>
      <?php
      endforeach;
      ?>
    </div>
    <?php if (!$args['variant']) : ?>
      <div class='c-portfolio-gallery--line-decor-bottom'></div>
    <?php endif; ?>

  </div>

</section>