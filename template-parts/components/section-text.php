<?php

/**
 * Template part for displaying hero banner
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hctc
 */
?>
<!-- wysiwyg -->
<?php if ($args['text-accent']) : ?>
  <div class='c-text-with-media__txt-paragraph c-text-with-media__txt-paragraph--accent'>
    <?php echo $args['text-accent'] ?>
  </div>
<?php endif; ?>
<?php if ($args['text-normal']) : ?>
  <div class='c-text-with-media__txt-paragraph '>
    <?php echo $args['text-normal'] ?>
  </div>
<?php endif; ?>
<?php if ($args['read-more']) : ?>
  <a class="c-text-with-media__txt-link" href='<?php echo $args['read-more']['url'] ?>' target='<?php echo $args['read-more']['target'] ?>'>
    <?php echo $args['read-more']['title'] ?>
  </a>
<?php endif; ?>