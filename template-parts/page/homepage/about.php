<?php

/**
 * Template part for displaying hero banner
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hctc
 */

$acf = get_field('homepage', 'options')['about'];
$decor = $acf['media']['decor'];
$images = $acf['media']['images'];
?>

<section class="l-section--content-wrapper ">
  <div class="l-section-divide l-section-divide--two-third c-text-with-media">
    <div class='c-text-with-media__assets'>
      <?php if ($decor) : ?>
        <img class='c-text-with-media__decor' src="<?php echo $decor['url'] ?>" alt="<?php echo $decor['title'] ?>">
      <?php endif; ?>
      <?php if ($images) : ?>
        <div class='c-text-with-media__assets-grid'>
          <?php foreach ($images as $img) : ?>
            <?php $image = $img['image'] ?>
            <img src="<?php echo $image['url'] ?>" alt="">
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
    <div class='c-text-with-media__txt'>
      <?php
      get_template_part(
        'template-parts/components/section-title',
        null,
        array(
          'url' => $acf['url'],
          'title' => $acf['title'],
        )
      ); ?>
      <!-- wysiwyg -->
      <div class='c-text-with-media__txt-paragraph c-text-with-media__txt-paragraph--accent'>
        <?php echo $acf['text-accent'] ?>
      </div>
      <div class='c-text-with-media__txt-paragraph '>
        <?php echo $acf['text-normal'] ?>
      </div>
      <a class="c-text-with-media__txt-link" href='<?php echo $acf['read-more']['url'] ?>' target='<?php echo $acf['read-more']['target'] ?>'>
        <?php echo $acf['read-more']['title'] ?>
      </a>
    </div>
  </div>
</section>