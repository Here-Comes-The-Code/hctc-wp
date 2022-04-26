<?php
/**
 * Template part for displaying hero banner
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hctc
 */
?>

<div class='c-section-title'>
  <a class="c-section-title__sub" href='<?php echo $args['url']['url'] ?>' target='<?php echo $args['url']['target'] ?>'>
    <?php echo $args['url']['title'] ?>
  </a>
  <h2 class="c-section-title__main">
    <?php echo $args['title'] ?>
  </h2>
</div>