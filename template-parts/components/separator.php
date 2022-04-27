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
$bg_color = $acf['bg'];
?>
<div class='c-separator' <?php
                          if ($bg_color) {
                            echo 'style="background-color: rgba(' . $bg_color['red'] . ',' .  $bg_color['green'] . ',' . $bg_color['blue'] . ',' . $bg_color['alpha'] . ')"';
                          };
                          ?>>
  <div class='c-separator__content'>
    <a class="c-separator__content-link" href='<?php echo $acf['url']['url'] ?>' target='<?php echo $acf['url']['target'] ?>'>
      <?php echo $acf['url']['title'] ?>
    </a>
    <h2 class="c-separator__content-title">
      <?php echo $acf['title'] ?>
    </h2>
  </div>
  <div class='c-separator__img'>
    <img class='js-parallax' src="<?php echo $acf['media']['url'] ?>" alt="">
  </div>
</div>